<?php

namespace App\Providers;

use Debugbar;
use App\Models\Setting;
use App\Models\SettingMember;
use App\Models\GeneralSetting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting = Setting::pluck('value', 'key')->toArray();
        $setting_member = SettingMember::pluck('value', 'key')->toArray();
        view()->composer('*', function ($view) use ($setting, $setting_member) {
            $view->with('setting', $setting)
                ->with('setting_member', $setting_member);
        });

        Debugbar::disable();
    }
}
