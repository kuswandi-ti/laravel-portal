<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard(getGuardNameAdmin())->check()) {
            return redirect()->route('admin.login')->with('error', 'Please login first !');
        } else {
            if (!Auth::guard(getGuardNameAdmin())->user()->email_verified_at) {
                Auth::guard(getGuardNameAdmin())->logout();
                return redirect()->route('admin.login')
                    ->with('error', 'You need to confirm your account. We have sent you an activation code, please check your email.');
            }
        }

        return $next($request);
    }
}
