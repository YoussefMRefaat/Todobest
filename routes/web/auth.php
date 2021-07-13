<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/**
 * @get Show the register form
 */
Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

/**
 * @post Send a register request
 */
Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

/**
 * @get Show the login form
 */
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

/**
 * @post Send a login request
 */
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

/**
 * @get Show the forgot-password view
 */
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

/**
 * @post Request a new password
 */
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

/**
 * @get Show the reset-password form
 *
 * @param string $token
 */
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

/**
 * @post Send a setting new password request
 */
Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

/**
 * @get Show the verify-email view
 */
Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

/**
 * @get Verify the user's email.
 * It's expected to be only requested from a link that has been sent to the user's email.
 *
 * @param int $id
 * @param string $hash - authentication token with its expire and signature as parameters
 */
Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

/**
 * @post Send a verification link to the user's email
 */
Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

/**
 * @get Show the confirm-password view
 */
Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

/**
 * @post Confirm the password
 */
Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

/**
 * @post Send a logout request
 */
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
