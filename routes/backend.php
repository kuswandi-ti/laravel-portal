<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProfileController as BackendProfileController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminAuthenticationController;

Route::group([
    'prefix' => 'admin',
    'as' => 'backend.'
], function () {
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
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('profile-password-update/{id}', [BackendProfileController::class, 'updatePassword'])->name('profile_password.update');
    Route::resource('profile', BackendProfileController::class);
});
