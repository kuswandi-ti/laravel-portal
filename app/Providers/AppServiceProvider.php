<?php

namespace App\Providers;

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
        // $general_setting = GeneralSetting::pluck('value', 'key')->toArray();

        // view()->composer('*', function ($view) use ($general_setting) {
        //     $view->with('general_setting', $general_setting);
        // });
    }
}
