<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mobile\MobileAuthController;
use App\Http\Controllers\Mobile\MobileNewsController;
use App\Http\Controllers\Mobile\MobileUserController;
use App\Http\Controllers\Mobile\MobileAccountController;
use App\Http\Controllers\Mobile\MobileProfileController;
use App\Http\Controllers\Mobile\MobileDashboardController;
use App\Http\Controllers\Mobile\MobileBankMemberController;
use App\Http\Controllers\Mobile\MobileGenerateDuesController;
use App\Http\Controllers\Mobile\MobileSettingMemberController;
use App\Http\Controllers\Mobile\MobileAccountCategoryController;
use App\Http\Controllers\Mobile\MobileOutstandingDuesController;
use App\Http\Controllers\Mobile\MobilePayDuesController;

Route::group(['middleware' => ['set_language']], function () {
    Route::get('/', [MobileAuthController::class, 'login'])->name('login');

    /** Auth Staff & User Routes */
    Route::get('register-verify/{token}', [MobileAuthController::class, 'registerVerify'])->name('register.verify');
    Route::post('register', [MobileAuthController::class, 'handleRegister'])->name('register.post');
    Route::get('login', [MobileAuthController::class, 'login'])->name('login');
    Route::post('login', [MobileAuthController::class, 'handleLogin'])->name('login.post');
    Route::get('forgot-password', [MobileAuthController::class, 'forgotPassword'])->name('forgot_password');
    Route::post('forgot-password', [MobileAuthController::class, 'sendResetLink'])->name('forgot_password.send');
    Route::get('reset-password/{token}', [MobileAuthController::class, 'resetPassword'])->name('reset_password');
    Route::post('reset-password', [MobileAuthController::class, 'handleResetPassword'])->name('reset_password.send');
});

Route::group([
    'middleware' => ['mobile', 'prevent_back_history']
], function () {
    /** Auth Staff & User Routes */
    Route::post('logout', [MobileAuthController::class, 'logout'])->name('logout');

    /** Profile Routes */
    Route::get('profile-data', [MobileProfileController::class, 'indexProfileData'])->name('profile_data.index');
    Route::put('profile-data-update/{id}', [MobileProfileController::class, 'updateProfileData'])->name('profile_data.update');
    Route::get('profile-image', [MobileProfileController::class, 'indexProfileImage'])->name('profile_image.index');
    Route::put('profile-image-update/{id}', [MobileProfileController::class, 'updateProfileImage'])->name('profile_image.update');

    /** Account Category Routes */
    Route::resource('account-category', MobileAccountCategoryController::class);

    /** Account Routes */
    Route::get('account/{category_id}', [MobileAccountController::class, 'index'])->name('account.index');
    Route::get('account/create/{category_id}', [MobileAccountController::class, 'create'])->name('account.create');
    Route::post('account/store', [MobileAccountController::class, 'store'])->name('account.store');
    Route::get('account/{id}/edit', [MobileAccountController::class, 'edit'])->name('account.edit');
    Route::put('account/{id}', [MobileAccountController::class, 'update'])->name('account.update');
    Route::delete('account/{id}', [MobileAccountController::class, 'destroy'])->name('account.destroy');

    /** Announcement Routes */
    Route::get('announcement/{id}', [MobileDashboardController::class, 'showAnnouncement'])->name('dashboard.show_announcement');

    /** Bank Member Routes */
    Route::resource('bank-member', MobileBankMemberController::class);

    /** Generate Dues Routes */
    Route::get('generate-dues', [MobileGenerateDuesController::class, 'index'])->name('generate_dues.index');
    Route::post('generate-dues', [MobileGenerateDuesController::class, 'generateDues'])->name('generate_dues.post');

    /** Outstanding Dues Routes */
    Route::get('outstanding-dues', [MobileOutstandingDuesController::class, 'index'])->name('outstanding_dues.index');
    Route::get('outstanding-dues/{user_id}', [MobileOutstandingDuesController::class, 'show'])->name('outstanding_dues.show');

    /** Pay Dues Routes */
    Route::get('pay-dues', [MobilePayDuesController::class, 'index'])->name('pay_dues.index');
    Route::post('pay-dues', [MobilePayDuesController::class, 'payDues'])->name('pay_dues.post');
    Route::get('pay-dues-user', [MobilePayDuesController::class, 'indexUser'])->name('pay_dues_user.index');

    /** Setting Routes */
    Route::resource('setting-member', MobileSettingMemberController::class);

    /** Bottom Menu Routes */
    Route::get('/dashboard', [MobileDashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/transaction', [MobileDashboardController::class, 'transaction'])->name('dashboard.transaction');
    Route::get('/notification', [MobileDashboardController::class, 'notification'])->name('dashboard.notification');
    Route::get('/setting', [MobileDashboardController::class, 'setting'])->name('dashboard.setting');

    /** User Routes */
    Route::resource('user', MobileUserController::class);
});
