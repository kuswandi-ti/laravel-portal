<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Member
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard(getGuardNameMember())->check()) {
            return redirect()->route('member.login')->with('error', 'Please login first !');
        } else {
            if (!Auth::guard(getGuardNameMember())->user()->email_verified_at) {
                Auth::guard(getGuardNameMember())->logout();
                return redirect()->route('member.login')
                    ->with('error', 'You need to confirm your account. We have sent you an activation code, please check your email.');
            }
        }

        return $next($request);
    }
}
