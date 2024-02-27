<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

// non auth routes
Route::get('/', [AuthController::class, 'index'])->name("login");
Route::post('/sign-out', [AuthController::class, 'signOut'])->name("sign-out");


// non auth API routes
Route::prefix('api')->group(function () {
    Route::post('/login', [AuthController::class, 'attemptLogin'])->name("attemptLogin");
});

// authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('reservation')->group(function () {
        Route::get('/', [ReservationController::class, 'index'])->name("reservation");
        Route::get('/dashboard', [ReservationController::class, 'dashboard'])->name("reservation.dashboard");
        Route::get('/new', [ReservationController::class, 'new'])->name("reservation.new");
        Route::get('/edit/{id}', [ReservationController::class, 'edit'])->name("reservation.edit");
    });

    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name("customer");
        Route::get('/new', [CustomerController::class, 'new'])->name("customer.new");
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name("customer.edit");
        Route::get('/customer/{status}', [CustomerController::class, 'status'])->name("customer.status");
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name("user");
        Route::get('/new', [UserController::class, 'new'])->name("user.new");
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name("user.edit");
    });

    //authenticated API routes:
    Route::prefix('api')->group(function () {
        Route::prefix('customer')->group(function () {
            Route::post('/store', [CustomerController::class, 'store'])->name("api.customer.store");
            Route::put('/delete/{id}', [CustomerController::class, 'delete'])->name("api.customer.delete");
            Route::post('/update/{id}', [CustomerController::class, 'update'])->name("api.customer.update");
        });

        Route::prefix('reservation')->group(function () {
            Route::post('/store', [ReservationController::class, 'store'])->name("api.reservation.store");
            Route::post('/update/{id}', [ReservationController::class, 'update'])->name("api.reservation.update");
            Route::put('/delete/{id}', [ReservationController::class, 'delete'])->name("api.reservation.delete");
        });

        Route::prefix('user')->group(function () {
            Route::post('/store', [UserController::class, 'store'])->name("api.user.store");
            Route::put('/delete/{id}', [UserController::class, 'delete'])->name("api.user.delete");
            Route::post('/update/{id}', [UserController::class, 'update'])->name("api.user.update");
        });
    });

    //authenticated admin routes
    Route::middleware(['role:admin'])->group(function () {
    });
});
