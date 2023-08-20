<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (getGuardNameLoggedUser() == getGuardNameAdmin()) {
            $setting_admin = getSettingAdmin();
            $locale = $setting_admin['default_language'];
        } elseif (getGuardNameLoggedUser() == getGuardNameMember()) {
            $setting_member = getSettingMember();
            $locale = $setting_member['default_language'];
        } else {
            $locale = 'en';
        }

        App::setLocale($locale);

        return $next($request);
    }
}
