<?php

namespace App\Http\Controllers\Mobile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Mail\MobileUserSendResetLinkMail;
use App\Http\Requests\Mobile\MobileAuthLoginRequest;
use App\Http\Requests\Mobile\MobileAuthResetPasswordRequest;
use App\Http\Requests\Mobile\MobileAuthSendResetLinkRequest;

class MobileAuthController extends Controller
{
    public function registerVerify($token)
    {
        return view('mobile.auth.register', compact('token'));
    }

    public function handleRegister(MemberAuthRegisterRequest $request)
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

    // public function registerVerify($token)
    // {
    //     $user = User::where('register_token', $token)->first();

    //     $message = 'Sorry your email cannot be identified.';

    //     if (!is_null($user)) {
    //         if (!$user->email_verified_at) {
    //             $message = "Your e-mail is verified. You can now continue registration";
    //             return redirect()->route('mobile.register')->with('success', $message);
    //         } else {
    //             $message = "Your e-mail is already verified. You can now login";
    //             return redirect()->route('mobile.login')->with('success', $message);
    //         }
    //     }
    // }

    // public function handleRegister(MemberAuthRegisterRequest $request)
    // {
    //     $setting = Setting::pluck('value', 'key')->toArray();

    //     // Create Area
    //     $residence = Residence::findOrFail($request->residence);
    //     $province_code = $residence->province_code;
    //     $city_code = $residence->city_code;
    //     $district_code = $residence->district_code;
    //     $village_code = $residence->village_code;
    //     $area = Area::create([
    //         'name' => $request->area_name,
    //         'slug' => Str::slug($request->area_name),
    //         'residence_id' => $request->residence,
    //         'province_code' => $province_code,
    //         'city_code' => $city_code,
    //         'district_code' => $district_code,
    //         'village_code' => $village_code,
    //         'package_id' => $request->package,
    //         'package_type' => $request->package_type,
    //         'membership_type' => 'trial',
    //         'register_date' => date_create('now')->format($setting['default_date_format']),
    //         'valid_to_date' => date($setting['default_date_format'], strtotime('+' . $setting['trial_days'] . ' days', strtotime(date_create('now')->format($setting['default_date_format'])))),
    //         'status' => 1,
    //     ]);;

    //     // Create Member
    //     $token = Str::random(64);
    //     $member = Member::create([
    //         'name' => $request->name,
    //         'slug' => Str::slug($request->name),
    //         'email' => $request->email,
    //         'image' => config('common.default_image_circle'),
    //         'area_id' => $area->id,
    //         'register_token' => $token,
    //         'password' => Hash::make($request->password),
    //         'status' => 1,
    //     ]);

    //     // Create Role
    //     $role = Role::create(['guard_name' => getGuardNameMember(), 'name' => getGuardTextAdmin(), 'area_id' => $area->id]);

    //     // Assign Permission to Member Role
    //     $role->givePermissionTo(setArrayMemberAdminPermission());

    //     // Assign Role to Member Admin User
    //     $member->assignRole($role);

    //     Mail::to($request->email)->send(new MemberAdminRegisterVerifyMail($token));

    //     return redirect()->route('member.login')->with('success', 'Register successfully. You need to confirm your account. We have sent you an activation code, please check your email.');;
    // }

    public function login()
    {
        if (!Auth::check()) {
            return view('mobile.auth.login');
        } else {
            return redirect()->route('mobile.dashboard.index');
        }
    }

    public function handleLogin(MobileAuthLoginRequest $request)
    {
        $request->authenticate();

        return redirect()->route('mobile.dashboard.index');
    }

    public function forgotPassword()
    {
        return view('mobile.auth.forgot-password');
    }

    public function sendResetLink(MobileAuthSendResetLinkRequest $request)
    {
        $token = Str::random(64);

        $user = User::where('email', $request->email)->first();
        $user->remember_token = $token;
        $user->save();

        Mail::to($request->email)->send(new MobileUserSendResetLinkMail($token, $request->email));

        return redirect()->back()->with('success', __('admin.A mail has been sent to your email address. Please check your email.'));
    }

    public function resetPassword($token)
    {
        return view('mobile.auth.reset-password', compact('token'));
    }

    public function handleResetPassword(MobileAuthResetPasswordRequest $request)
    {
        $user = User::where([
            'email' => $request->email,
            'remember_token' => $request->token,
        ])->first();

        if (!$user) {
            return back()->with('error', __('admin.Token is invalid !'));
        }

        $user->password = bcrypt($request->password);
        $user->remember_token = null;
        $user->save();

        return redirect()->route('mobile.login')->with('success', __('admin.Password reset successfully. Please login first'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('website.index');
    }
}
