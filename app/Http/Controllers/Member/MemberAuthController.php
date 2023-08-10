<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Member\MemberAuthLoginRequest;
use App\Http\Requests\Member\MemberAuthRegisterRequest;

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

    public function handleRegister(MemberAuthRegisterRequest $request)
    {
        $member = Member::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'image' => config('common.default_image_circle'),
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($member));

        Auth::guard('member')->login($member);

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
