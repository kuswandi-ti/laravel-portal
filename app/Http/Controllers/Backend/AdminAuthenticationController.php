<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AdminSendResetLinkMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdminHandleLoginRequest;
use App\Http\Requests\AdminResetPasswordRequest;
use App\Http\Requests\AdminSendResetLinkRequest;

class AdminAuthenticationController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }

    public function handleLogin(AdminHandleLoginRequest $request)
    {
        $request->authenticate();

        return redirect()->route('backend.dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('backend.login');
    }

    public function forgotPassword()
    {
        return view('backend.auth.forgot-password');
    }

    public function sendResetLink(AdminSendResetLinkRequest $request)
    {
        $token = Str::random(64);

        $admin = Admin::where('email', $request->email)->first();
        $admin->remember_token = $token;
        $admin->save();

        Mail::to($request->email)->send(new AdminSendResetLinkMail($token, $request->email));

        return redirect()->back()->with('success', 'A mail has been sent to your email address. Please check your email.');
    }

    public function resetPassword($token)
    {
        return view('backend.auth.reset-password', compact('token'));
    }

    public function handleResetPassword(AdminResetPasswordRequest $request)
    {
        $admin = Admin::where([
            'email' => $request->email,
            'remember_token' => $request->token,
        ])->first();

        if (!$admin) {
            return back()->with('error', 'Token is invalid !');
        }

        $admin->password = bcrypt($request->password);
        $admin->remember_token = null;
        $admin->save();

        return redirect()->route('backend.login')->with('success', 'Password reset successfully.');
    }
}
