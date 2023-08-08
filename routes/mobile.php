<?php

use App\Http\Controllers\Mobile\DashboardController;

Route::group([], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/transaction', [DashboardController::class, 'transaction'])->name('dashboard.transaction');
    Route::get('/notification', [DashboardController::class, 'notification'])->name('dashboard.notification');
    Route::get('/setting', [DashboardController::class, 'setting'])->name('dashboard.setting');
});
