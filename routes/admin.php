<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminLanguageController;
use App\Http\Controllers\Admin\AdminAdminUserController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminResidenceController;
use App\Http\Controllers\Admin\AdminMemberUserController;
use App\Http\Controllers\Admin\AdminPermissionController;

Route::group([], function () {
    /** Auth Admin Routes */
    Route::get('login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthController::class, 'handleLogin'])->name('handle_login');
    Route::get('forgot-password', [AdminAuthController::class, 'forgotPassword'])->name('forgot_password');
    Route::post('forgot-password', [AdminAuthController::class, 'sendResetLink'])->name('forgot_password.send');
    Route::get('reset-password/{token}', [AdminAuthController::class, 'resetPassword'])->name('reset_password');
    Route::post('reset-password', [AdminAuthController::class, 'handleResetPassword'])->name('reset_password.send');
});

Route::group([
    'middleware' => ['admin']
], function () {
    /** Auth Admin Routes */
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    /** Dashboard Routes */
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

    /** Package Routes */
    Route::resource('package', AdminPackageController::class);

    /** Profile Routes */
    Route::put('profile-password-update/{id}', [AdminProfileController::class, 'updatePassword'])->name('profile_password.update');
    Route::resource('profile', AdminProfileController::class);

    /** Permission Routes */
    Route::resource('permission', AdminPermissionController::class);

    /** Role Routes */
    Route::resource('role', AdminRoleController::class);

    /** User Admin Routes */
    Route::resource('admin', AdminAdminUserController::class);
    Route::get('admin/restore/{id}', [AdminAdminUserController::class, 'restore'])->name('admin.restore');

    /** Member User Routes */
    Route::resource('member', AdminMemberUserController::class);
    Route::get('member/restore/{id}', [AdminMemberUserController::class, 'restore'])->name('member.restore');

    /** Residence Routes */
    Route::resource('residence', AdminResidenceController::class);
    Route::get('residence/restore/{id}', [AdminResidenceController::class, 'restore'])->name('residence.restore');
    Route::post('get-cities', [AdminResidenceController::class, 'getCities'])->name('residence.get_cities');
    Route::post('get-districts', [AdminResidenceController::class, 'getDistricts'])->name('residence.get_districts');
    Route::post('get-villages', [AdminResidenceController::class, 'getVillages'])->name('residence.get_villages');

    /** Language Routes */
    Route::resource('language', AdminLanguageController::class);

    /** Setting Routes */
    Route::get('setting', [AdminSettingController::class, 'index'])->name('setting.index');
    Route::get('general-setting', [AdminSettingController::class, 'generalSettingIndex'])->name('general_setting.index');
    Route::put('general-setting', [AdminSettingController::class, 'generalSettingUpdate'])->name('general_setting.update');
    Route::get('notification-setting', [AdminSettingController::class, 'notificationSettingIndex'])->name('notification_setting.index');
    Route::put('notification-setting', [AdminSettingController::class, 'notificationSettingUpdate'])->name('notification_setting.update');
});
