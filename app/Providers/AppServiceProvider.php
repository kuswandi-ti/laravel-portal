<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\SettingMember;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
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
        view()->composer('*', function ($view) {
            $view->with('setting', Setting::pluck('value', 'key')->toArray())
                ->with('setting_member', !empty(Auth::guard('member')->user()) ? SettingMember::where('member_id', Auth::guard('member')->user()->id)->get()->pluck('value', 'key')->toArray() : '');
        });

        Debugbar::disable();
    }
}
