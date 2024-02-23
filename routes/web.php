<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomController;

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
        Route::get('/edit', [ReservationController::class, 'edit'])->name("reservation.edit");
    });

    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name("customer");
        Route::get('/new', [CustomerController::class, 'new'])->name("customer.new");
        Route::get('/edit/{customer}', [CustomerController::class, 'edit'])->name("customer.edit");
        Route::get('/delete', [CustomerController::class, 'delete'])->name("customer.delete");
    });

    Route::prefix('room')->group(function () {
        Route::get('/', [RoomController::class, 'index'])->name("rooms");
//        Route::get('/new', [CustomerController::class, 'new'])->name("customer.new");
//        Route::get('/edit/{customer}', [CustomerController::class, 'edit'])->name("customer.edit");
//        Route::get('/delete', [CustomerController::class, 'delete'])->name("customer.delete");
    });

    //authenticated API routes:
    Route::prefix('api')->group(function () {
        Route::prefix('customer')->group(function () {
            Route::post('/store', [CustomerController::class, 'store'])->name("customer.store");
        });
    });

    //authenticated admin routes
    Route::middleware(['role:admin'])->group(function () {
        Route::prefix('room')->group(function () {
            Route::get('/new', [RoomController::class, 'new'])->name("room.new");
            // TODO: Add edit route for rooms
        });
        // Authenticated Admin API routes
        Route::prefix('api')->group(function () {
            Route::prefix('room')->group(function () {
                Route::post('/store', [RoomController::class, 'store'])->name("room.store");
                // TODO: Add delete request for rooms
            });
        });
    });
});
