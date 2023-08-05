<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\AdminAuthenticationController;

Route::group([
    'prefix' => 'admin',
    'as' => 'backend.'
], function () {
    /** Auth Admin Routes */
    Route::get('login', [AdminAuthenticationController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthenticationController::class, 'handleLogin'])->name('handle_login');
    Route::post('logout', [AdminAuthenticationController::class, 'logout'])->name('logout');
    Route::get('forgot-password', [AdminAuthenticationController::class, 'forgotPassword'])->name('forgot_password');
    Route::post('forgot-password', [AdminAuthenticationController::class, 'sendResetLink'])->name('forgot_password.send');
    Route::get('reset-password/{token}', [AdminAuthenticationController::class, 'resetPassword'])->name('reset_password');
    Route::post('reset-password', [AdminAuthenticationController::class, 'handleResetPassword'])->name('reset_password.send');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'backend.',
    'middleware' => ['admin']
], function () {
    /** Dashboard Routes */
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    /** Profile Routes */
    Route::put('profile-password-update/{id}', [ProfileController::class, 'updatePassword'])->name('profile_password.update');
    Route::resource('profile', ProfileController::class);

    /** Language Routes */
    Route::resource('language', LanguageController::class);

    /** Permission Routes */
    Route::resource('permission', PermissionController::class);

    /** Role Routes */
    Route::resource('role', RoleController::class);
});
