<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;

// non auth routes
Route::get('/', [AuthController::class, 'index'])->name("login");

// non auth api routes
Route::prefix('api')->group(function () {
    Route::post('/login', [AuthController::class, 'attemptLogin'])->name("attemptLogin");
});

// authenticated routes
Route::middleware(['auth'])->group(function () {

    Route::get('/reservation', [ReservationController::class, 'index'])->name("reservation");
    Route::get('/reservation/dashboard', [ReservationController::class, 'dashboard'])->name("reservation.dashboard");
    Route::get('/reservation/new', [ReservationController::class, 'new'])->name("reservation.new");
    Route::get('/reservation/edit', [ReservationController::class, 'edit'])->name("reservation.edit");

    // admin routes
    Route::middleware(['role:admin'])->group(function () {

    });
});
