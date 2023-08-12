<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Member\MemberAuthLoginRequest;
use App\Http\Requests\Member\MemberAuthRegisterRequest;

class MemberAuthController extends Controller
{
    public function register()
    {
        return view('member.auth.register');
    }

    public function handleRegister(MemberAuthRegisterRequest $request)
    {
        $token = Str::random(64);

        Member::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'image' => config('common.default_image_circle'),
            'register_token' => $token,
            'password' => Hash::make($request->password),
        ]);

        Mail::send('mail.member-register-verify-mail', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });

        return redirect()->route('member.dashboard.index');
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
        if (!Auth::guard('member')->check()) {
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

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('member')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('member.login');
    }
}
