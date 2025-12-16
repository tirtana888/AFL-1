<?php

/**
 * =============================================================================
 * AUTH ROUTES - ROUTE AUTENTIKASI
 * =============================================================================
 * File ini berisi route untuk Login, Register, dan Logout
 * Disederhanakan dari Laravel Breeze (hanya fitur yang dipakai)
 * =============================================================================
 */

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// =============================================================================
// GUEST ROUTES (Hanya untuk user yang belum login)
// =============================================================================

Route::middleware('guest')->group(function () {

    /**
     * REGISTER - Pendaftaran User Baru
     */
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    /**
     * LOGIN - Masuk ke Aplikasi
     */
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// =============================================================================
// AUTHENTICATED ROUTES (Hanya untuk user yang sudah login)
// =============================================================================

Route::middleware('auth')->group(function () {

    /**
     * LOGOUT - Keluar dari Aplikasi
     */
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
