<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Mobile\MobileAuthLoginRequest;

class MobileAuthController extends Controller
{
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

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('website.index');
    }
}
