<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Member\MemberAuthLoginRequest;

class MemberAuthController extends Controller
{
    public function register()
    {
        return view('member.auth.register');
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
