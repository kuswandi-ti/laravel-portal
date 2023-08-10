<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\MemberAuthController;
use App\Http\Controllers\Member\MemberSettingController;
use App\Http\Controllers\Member\MemberDashboardController;

Route::group([], function () {
    /** Auth Member Routes */
    Route::get('register', [MemberAuthController::class, 'register'])->name('register');
    Route::post('register', [MemberAuthController::class, 'handleRegister'])->name('handle_register');
    Route::get('login', [MemberAuthController::class, 'login'])->name('login');
    Route::post('login', [MemberAuthController::class, 'handleLogin'])->name('handle_login');
    Route::post('logout', [MemberAuthController::class, 'logout'])->name('logout');
    // Route::get('forgot-password', [AdminAuthController::class, 'forgotPassword'])->name('forgot_password');
    // Route::post('forgot-password', [AdminAuthController::class, 'sendResetLink'])->name('forgot_password.send');
    // Route::get('reset-password/{token}', [AdminAuthController::class, 'resetPassword'])->name('reset_password');
    // Route::post('reset-password', [AdminAuthController::class, 'handleResetPassword'])->name('reset_password.send');
});

Route::group([
    'middleware' => ['member']
], function () {
    /** Dashboard Routes */
    Route::get('dashboard', [MemberDashboardController::class, 'index'])->name('dashboard.index');

    // /** Profile Routes */
    // Route::put('profile-password-update/{id}', [AdminProfileController::class, 'updatePassword'])->name('profile_password.update');
    // Route::resource('profile', AdminProfileController::class);

    // /** Language Routes */
    // Route::resource('language', AdminLanguageController::class);

    // /** Permission Routes */
    // Route::resource('permission', AdminPermissionController::class);

    // /** Role Routes */
    // Route::resource('role', AdminRoleController::class);

    // /** User Admin Routes */
    // Route::resource('admin', AdminAdminUserController::class);
    // Route::get('admin/restore/{id}', [AdminAdminUserController::class, 'restore'])->name('admin.restore');

    /** Setting Routes */
    Route::get('setting', [MemberSettingController::class, 'index'])->name('setting.index');
    // Route::get('general-setting', [AdminSettingController::class, 'generalSettingIndex'])->name('general_setting.index');
    // Route::put('general-setting', [AdminSettingController::class, 'generalSettingUpdate'])->name('general_setting.update');

    // /** Member User Routes */
    // Route::resource('member', AdminMemberUserController::class);
    // Route::get('member/restore/{id}', [AdminMemberUserController::class, 'restore'])->name('member.restore');

    Route::post('get-cities', [MemberSettingController::class, 'getCities'])->name('setting.get_cities');
    Route::post('get-districts', [MemberSettingController::class, 'getDistricts'])->name('setting.get_districts');
    Route::post('get-villages', [MemberSettingController::class, 'getVillages'])->name('setting.get_villages');
});
