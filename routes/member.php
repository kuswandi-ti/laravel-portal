<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\MemberAuthController;
use App\Http\Controllers\Member\MemberRoleController;
use App\Http\Controllers\Member\MemberBlockController;
use App\Http\Controllers\Member\MemberHouseController;
use App\Http\Controllers\Member\MemberStreetController;
use App\Http\Controllers\Member\MemberProfileController;
use App\Http\Controllers\Member\MemberSettingController;
use App\Http\Controllers\Member\MemberAdminUserController;
use App\Http\Controllers\Member\MemberDashboardController;
use App\Http\Controllers\Member\MemberStaffUserController;

Route::get('/', [MemberAuthController::class, 'login'])->name('login');

Route::group([], function () {
    /** Auth Member Routes */
    Route::get('register', [MemberAuthController::class, 'register'])->name('register');
    Route::post('register', [MemberAuthController::class, 'handleRegister'])->name('register.post');
    Route::get('login', [MemberAuthController::class, 'login'])->name('login');
    Route::post('login', [MemberAuthController::class, 'handleLogin'])->name('login.post');
    Route::get('register-verify/{token}', [MemberAuthController::class, 'registerVerify'])->name('register.verify');
    Route::get('forgot-password', [MemberAuthController::class, 'forgotPassword'])->name('forgot_password');
    Route::post('forgot-password', [MemberAuthController::class, 'sendResetLink'])->name('forgot_password.send');
    Route::get('reset-password/{token}', [MemberAuthController::class, 'resetPassword'])->name('reset_password');
    Route::post('reset-password', [MemberAuthController::class, 'handleResetPassword'])->name('reset_password.send');
});

Route::group([
    'middleware' => ['member']
], function () {
    /** Auth Member Routes */
    Route::post('logout', [MemberAuthController::class, 'logout'])->name('logout');

    /** Dashboard Routes */
    Route::get('dashboard', [MemberDashboardController::class, 'index'])->name('dashboard.index');

    /** Profile Routes */
    Route::get('profile-password', [MemberProfileController::class, 'indexPassword'])->name('profile_password.index');
    Route::put('profile-password-update/{id}', [MemberProfileController::class, 'updatePassword'])->name('profile_password.update');
    Route::resource('profile', MemberProfileController::class);

    /** Street Routes */
    Route::resource('street', MemberStreetController::class);
    Route::get('street/restore/{id}', [MemberStreetController::class, 'restore'])->name('street.restore');

    /** Block Routes */
    Route::resource('block', MemberBlockController::class);
    Route::get('block/restore/{id}', [MemberBlockController::class, 'restore'])->name('block.restore');

    /** House Routes */
    Route::resource('house', MemberHouseController::class);

    /** Role Routes */
    Route::resource('role', MemberRoleController::class);

    /** Admin Routes */
    Route::resource('admin', MemberAdminUserController::class);
    Route::get('admin/restore/{id}', [MemberAdminUserController::class, 'restore'])->name('admin.restore');

    /** User Routes */
    Route::resource('staff', MemberStaffUserController::class);
    Route::get('staff/restore/{id}', [MemberStaffUserController::class, 'restore'])->name('staff.restore');

    /** Setting Routes */
    Route::get('setting', [MemberSettingController::class, 'index'])->name('setting.index');
    Route::put('setting-area/{id}', [MemberSettingController::class, 'settingAreaUpdate'])->name('setting_area.update');
    Route::put('setting-logo', [MemberSettingController::class, 'settingLogoUpdate'])->name('setting_logo.update');

    /** Others Routes */
    Route::post('get-cities', [MemberSettingController::class, 'getCities'])->name('setting.get_cities');
    Route::post('get-districts', [MemberSettingController::class, 'getDistricts'])->name('setting.get_districts');
    Route::post('get-villages', [MemberSettingController::class, 'getVillages'])->name('setting.get_villages');
});
