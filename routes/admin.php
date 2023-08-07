<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminLanguageController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPermissionController;
use App\Http\Controllers\Admin\AdminGeneralSettingController;

Route::group([], function () {
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
    Route::get('general-setting', [AdminGeneralSettingController::class, 'index'])->name('general_setting.index');
    Route::put('general-setting', [AdminGeneralSettingController::class, 'updateGeneralSetting'])->name('general_setting.update');
});
