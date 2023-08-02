<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminAuthenticationController;

Route::group([
    'prefix' => 'admin',
    'as' => 'backend.'], function() {
    Route::get('login', [AdminAuthenticationController::class, 'login'])->name('login');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'backend.',
    'middleware' => ['admin']
], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');
});
