<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminRoleController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AdminSettingController;
use App\Http\Controllers\Backend\AdminLanguageController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\AdminPermissionController;

Route::group([
    'prefix' => 'admin',
    'as' => 'backend.'
], function () {
    /** Auth Admin Routes */
    Route::get('login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthController::class, 'handleLogin'])->name('handle_login');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('forgot-password', [AdminAuthController::class, 'forgotPassword'])->name('forgot_password');
    Route::post('forgot-password', [AdminAuthController::class, 'sendResetLink'])->name('forgot_password.send');
    Route::get('reset-password/{token}', [AdminAuthController::class, 'resetPassword'])->name('reset_password');
    Route::post('reset-password', [AdminAuthController::class, 'handleResetPassword'])->name('reset_password.send');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'backend.',
    'middleware' => ['admin']
], function () {
    /** Dashboard Routes */
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

    /** Profile Routes */
    Route::put('profile-password-update/{id}', [AdminProfileController::class, 'updatePassword'])->name('profile_password.update');
    Route::resource('profile', AdminProfileController::class);

    /** Language Routes */
    Route::resource('language', AdminLanguageController::class);

    /** Permission Routes */
    Route::resource('permission', AdminPermissionController::class);

    /** Role Routes */
    Route::resource('role', AdminRoleController::class);

    /** User Admin Routes */
    Route::resource('admin', AdminUserController::class);

    /** Setting Routes */
    Route::resource('setting', AdminSettingController::class);
});
