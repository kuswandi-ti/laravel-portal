<?php

namespace App\Providers;

use App\Models\Setting;
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

        view()->composer('*', function ($view) use ($setting) {
            $view->with('setting', $setting);
        });

        \Debugbar::disable();
    }
}
