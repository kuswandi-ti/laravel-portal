<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;
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
            $locale = !empty($setting_admin['default_language']) ? $setting_admin['default_language'] : 'en';
        } elseif (getGuardNameLoggedUser() == getGuardNameMember()) {
            $setting_member = getSettingMember();
            $locale = !empty($setting_member['default_language']) ? $setting_member['default_language'] : 'en';
        } else {
            $setting_default = Setting::pluck('value', 'key')->toArray();
            $locale = !empty($setting_default['default_language']) ? $setting_default['default_language'] : 'en';
        }

        App::setLocale($locale);

        return $next($request);
    }
}
