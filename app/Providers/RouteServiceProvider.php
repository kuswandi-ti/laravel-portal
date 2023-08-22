<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware(['web', 'set_language'])
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));

            Route::middleware(['web'])
                ->prefix('member')
                ->name('member.')
                ->group(base_path('routes/member.php'));

            Route::middleware(['web', 'set_language'])
                ->prefix('mobile')
                ->name('mobile.')
                ->group(base_path('routes/mobile.php'));

            Route::middleware(['web'])
                ->prefix('user')
                ->name('user.')
                ->group(base_path('routes/user.php'));

            Route::middleware(['web'])
                ->name('website.')
                ->group(base_path('routes/website.php'));
        });
    }
}
