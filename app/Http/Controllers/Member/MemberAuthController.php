<?php

namespace App\Http\Controllers\Member;

use App\Models\Area;
use App\Models\Member;
use App\Models\Package;
use App\Models\Setting;
use App\Models\Residence;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberSendResetLinkMail;
use Illuminate\Http\RedirectResponse;
use App\Mail\MemberAdminSendResetLinkMail;
use App\Mail\MemberAdminRegisterVerifyMail;
use App\Http\Requests\Member\MemberAuthLoginRequest;
use App\Http\Requests\Member\MemberAuthRegisterRequest;
use App\Http\Requests\Member\MemberAuthResetPasswordRequest;
use App\Http\Requests\Member\MemberAuthSendResetLinkRequest;

class MemberAuthController extends Controller
{
    public function register()
    {
        $residences = Residence::orderBy('name')->get()->pluck('name', 'id');
        $packages = Package::orderBy('name')->get()->pluck('name', 'id');
        return view('member.auth.register', compact('residences', 'packages'));
    }

    public function handleRegister(MemberAuthRegisterRequest $request)
    {
        $setting = Setting::pluck('value', 'key')->toArray();

        // Create Area
        $residence = Residence::findOrFail($request->residence);
        $province_code = $residence->province_code;
        $city_code = $residence->city_code;
        $district_code = $residence->district_code;
        $village_code = $residence->village_code;
        $area = Area::create([
            'name' => $request->area_name,
            'slug' => Str::slug($request->area_name),
            'residence_id' => $request->residence,
            'province_code' => $province_code,
            'city_code' => $city_code,
            'district_code' => $district_code,
            'village_code' => $village_code,
            'package_id' => $request->package,
            'package_type' => $request->package_type,
            'membership_type' => 'trial',
            'register_date' => date_create('now')->format($setting['default_date_format']),
            'valid_to_date' => date($setting['default_date_format'], strtotime('+' . $setting['trial_days'] . ' days', strtotime(date_create('now')->format($setting['default_date_format'])))),
            'status' => 1,
        ]);;

        // Create Member
        $token = Str::random(64);
        $member = Member::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'image' => config('common.default_image_circle'),
            'area_id' => $area->id,
            'register_token' => $token,
            'password' => Hash::make($request->password),
            'status' => 1,
        ]);

        // Create Role
        $role = Role::create(['guard_name' => getGuardNameMember(), 'name' => getGuardTextAdmin(), 'area_id' => $area->id]);

        // Assign Permission to Member Role
        $role->givePermissionTo(setArrayMemberAdminPermission());

        // Assign Role to Member Admin User
        $member->assignRole($role);

        Mail::to($request->email)->send(new MemberAdminRegisterVerifyMail($token));

        return redirect()->route('member.login')->with('success', 'Register successfully. You need to confirm your account. We have sent you an activation code, please check your email.');;
    }

    public function registerVerify($token)
    {
        $member = Member::where('register_token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($member)) {
            if (!$member->email_verified_at) {
                $member->email_verified_at = now();
                $member->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect()->route('member.login')->with('success', $message);
    }

    public function login()
    {
        if (!Auth::guard(getGuardNameMember())->check()) {
            return view('member.auth.login');
        } else {
            return redirect()->route('member.dashboard.index');
        }
    }

    public function handleLogin(MemberAuthLoginRequest $request)
    {
        $request->authenticate();

        return redirect()->route('member.dashboard.index');
    }

    public function forgotPassword()
    {
        return view('member.auth.forgot-password');
    }

    public function sendResetLink(MemberAuthSendResetLinkRequest $request)
    {
        $token = Str::random(64);

        $member = Member::where('email', $request->email)->first();
        $member->remember_token = $token;
        $member->save();

        Mail::to($request->email)->send(new MemberAdminSendResetLinkMail($token, $request->email));

        return redirect()->back()->with('success', __('admin.A mail has been sent to your email address. Please check your email.'));
    }

    public function resetPassword($token)
    {
        return view('member.auth.reset-password', compact('token'));
    }

    public function handleResetPassword(MemberAuthResetPasswordRequest $request)
    {
        $member = Member::where([
            'email' => $request->email,
            'remember_token' => $request->token,
        ])->first();

        if (!$member) {
            return back()->with('error', __('admin.Token is invalid !'));
        }

        $member->password = bcrypt($request->password);
        $member->remember_token = null;
        $member->save();

        return redirect()->route('member.login')->with('success', __('admin.Password reset successfully. Please login first'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard(getGuardNameMember())->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('website.index');
    }
}
