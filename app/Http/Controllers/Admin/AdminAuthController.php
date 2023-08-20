<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AdminSendResetLinkMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\AdminAuthLoginRequest;
use App\Http\Requests\Admin\AdminAuthResetPasswordRequest;
use App\Http\Requests\Admin\AdminAuthSendResetLinkRequest;

class AdminAuthController extends Controller
{
    public function login()
    {
        if (!Auth::guard('admin')->check()) {
            return view('admin.auth.login');
        } else {
            return redirect()->route('admin.dashboard.index');
        }
    }

    public function handleLogin(AdminAuthLoginRequest $request)
    {
        $request->authenticate();

        return redirect()->route('admin.dashboard.index');
    }

    public function forgotPassword()
    {
        return view('admin.auth.forgot-password');
    }

    public function sendResetLink(AdminAuthSendResetLinkRequest $request)
    {
        $token = Str::random(64);

        $admin = Admin::where('email', $request->email)->first();
        $admin->remember_token = $token;
        $admin->save();

        Mail::to($request->email)->send(new AdminSendResetLinkMail($token, $request->email));

        return redirect()->back()->with('success', __('admin.A mail has been sent to your email address. Please check your email.'));
    }

    public function resetPassword($token)
    {
        return view('admin.auth.reset-password', compact('token'));
    }

    public function handleResetPassword(AdminAuthResetPasswordRequest $request)
    {
        $admin = Admin::where([
            'email' => $request->email,
            'remember_token' => $request->token,
        ])->first();

        if (!$admin) {
            return back()->with('error', __('admin.Token is invalid !'));
        }

        $admin->password = bcrypt($request->password);
        $admin->remember_token = null;
        $admin->save();

        return redirect()->route('admin.login')->with('success', __('admin.Password reset successfully. Please login first'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
