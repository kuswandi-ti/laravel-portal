<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminAuthenticationController;

Route::group([
    'prefix' => 'admin',
    'as' => 'backend.'
], function () {
    Route::get('login', [AdminAuthenticationController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthenticationController::class, 'handleLogin'])->name('handle_login');
    Route::post('logout', [AdminAuthenticationController::class, 'logout'])->name('logout');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'backend.',
    'middleware' => ['admin']
], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');
});
