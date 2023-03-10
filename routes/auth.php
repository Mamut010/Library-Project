<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\PasswordConfirmController;
use App\Http\Controllers\Auth\PasswordChangeController;

/*
|--------------------------------------------------------------------------
| Web Auth Routes
|--------------------------------------------------------------------------
|
| Routes in this file are used for authentication purpose.
|
*/

Route::middleware('guest')->group(function() {
    /**
     * Login Routes
     */
    Route::prefix('/login')->group(function() {
        Route::get('/', [LoginController::class, 'index'])
            ->name('login');

        Route::post('/', [LoginController::class, 'login']);
    });

    /**
     * Register Routes
     */
    Route::prefix('/register')->group(function() {
        Route::get('/', [RegisterController::class, 'index'])
            ->name('register');

        Route::post('/', [RegisterController::class, 'register']);
    });

    /**
     * Forgot password Routes
     */
    Route::prefix('/password')->group(function() {
        Route::get('/forgot', [ForgotPasswordController::class, 'showForgotPasswordForm'])
            ->name('password.forgot');

        Route::post('/forgot', [ForgotPasswordController::class, 'handleForgotPasswordForm'])
            ->name('password.email');

        Route::get('/reset/{token}', [ForgotPasswordController::class, 'showPasswordResetForm'])
            ->name('password.reset');

        Route::post('/reset', [ForgotPasswordController::class, 'handlePasswordResetForm'])
            ->name('password.update');
    });
});

Route::middleware('auth')->group(function() {
    /**
     * Logout Routes
     */
    Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')
        ->name('logout');

    /**
     * Email verification Routes
     */
    Route::prefix('/email')->group(function() {
        Route::get('/verify', [EmailVerificationController::class, 'index'])
            ->name('verification.notice');

        Route::get('/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Route::post('/resend', [EmailVerificationController::class, 'resend'])->middleware('throttle:6,1')
            ->name('verification.resend');
    });
});

Route::middleware(['auth', 'verified'])->group(function() {
    /**
     * Password confirmation Routes
     */
    Route::get('/confirm-password', [PasswordConfirmController::class, 'showForm'])->name('password.confirm');
    Route::post('/confirm-password', [PasswordConfirmController::class, 'handleForm'])->middleware('throttle:6,1');

    /**
     * Password change Routes
     */
    Route::middleware('password.confirm')->group(function() {
        Route::get('/change-password', [PasswordChangeController::class, 'showForm'])->name('password.change');
        Route::post('/change-password', [PasswordChangeController::class, 'handleForm'])->middleware('throttle:6,1');
    });
});
