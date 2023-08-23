<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mobile\MobileAuthController;
use App\Http\Controllers\Mobile\MobileUserController;
use App\Http\Controllers\Mobile\MobileProfileController;
use App\Http\Controllers\Mobile\MobileDashboardController;

Route::group(['middleware' => ['set_language']], function () {
    Route::get('/', [MobileAuthController::class, 'login'])->name('login');

    /** Auth Staff & User Routes */
    Route::get('register', [MobileAuthController::class, 'register'])->name('register');
    Route::post('register', [MobileAuthController::class, 'handleRegister'])->name('register.post');
    Route::get('login', [MobileAuthController::class, 'login'])->name('login');
    Route::post('login', [MobileAuthController::class, 'handleLogin'])->name('login.post');
    Route::get('register-verify/{token}', [MobileAuthController::class, 'registerVerify'])->name('register.verify');
    Route::get('forgot-password', [MobileAuthController::class, 'forgotPassword'])->name('forgot_password');
    Route::post('forgot-password', [MobileAuthController::class, 'sendResetLink'])->name('forgot_password.send');
    Route::get('reset-password/{token}', [MobileAuthController::class, 'resetPassword'])->name('reset_password');
    Route::post('reset-password', [MobileAuthController::class, 'handleResetPassword'])->name('reset_password.send');
});

Route::group([
    'middleware' => ['mobile']
], function () {
    /** Auth Staff & User Routes */
    Route::post('logout', [MobileAuthController::class, 'logout'])->name('logout');

    /** Profile Routes */
    Route::get('profile-data', [MobileProfileController::class, 'indexProfileData'])->name('profile_data.index');
    Route::put('profile-data-update/{id}', [MobileProfileController::class, 'updateProfileData'])->name('profile_data.update');
    Route::get('profile-image', [MobileProfileController::class, 'indexProfileImage'])->name('profile_image.index');
    Route::put('profile-image-update/{id}', [MobileProfileController::class, 'updateProfileImage'])->name('profile_image.update');

    /** Bottom Menu Routes */
    Route::get('/dashboard', [MobileDashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/transaction', [MobileDashboardController::class, 'transaction'])->name('dashboard.transaction');
    Route::get('/notification', [MobileDashboardController::class, 'notification'])->name('dashboard.notification');
    Route::get('/setting', [MobileDashboardController::class, 'setting'])->name('dashboard.setting');

    /** User Routes */
    Route::resource('user', MobileUserController::class);
});
