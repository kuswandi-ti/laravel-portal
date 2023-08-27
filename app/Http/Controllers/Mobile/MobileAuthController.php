<?php

namespace App\Http\Controllers\Mobile;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Mail\MobileUserSendResetLinkMail;
use App\Http\Requests\Mobile\MobileAuthLoginRequest;
use App\Http\Requests\Mobile\MobileAuthRegisterRequest;
use App\Http\Requests\Mobile\MobileAuthResetPasswordRequest;
use App\Http\Requests\Mobile\MobileAuthSendResetLinkRequest;

class MobileAuthController extends Controller
{
    public function registerVerify($token)
    {
        $user = User::where('register_token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($user)) {
            if (!$user->email_verified_at) {
                $message = "Your e-mail is verified. You can now continue registration";
                return view('mobile.auth.register')->with([
                    'success' => $message,
                    'token' => $token,
                    'user' => $user,
                ]);
            } else {
                $message = "Your e-mail is already verified. You can now login";
                return view('mobile.auth.login')->with([
                    'success' => $message,
                ]);
            }
        }
    }

    public function handleRegister(MobileAuthRegisterRequest $request)
    {
        $user = User::where([
            'email' => $request->email,
            'register_token' => $request->token,
        ])->first();

        if (!$user) {
            return back()->with('error', __('Token is invalid !'));
        }

        $user->email_verified_at = now();
        $user->password = bcrypt($request->password);
        $user->register_token = null;
        $user->save();

        return redirect()->route('mobile.login')->with('success', __('Registered new user successfully. Please login first'));
    }

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

        return redirect()->back()->with('success', __('A mail has been sent to your email address. Please check your email.'));
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
            return back()->with('error', __('Token is invalid !'));
        }

        $user->password = bcrypt($request->password);
        $user->remember_token = null;
        $user->save();

        return redirect()->route('mobile.login')->with('success', __('Password reset successfully. Please login first'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('website.index');
    }
}
