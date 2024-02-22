<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', 'App\Http\Controllers\ReservationController@test');


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/customer', [CustomerController::class, 'index'])->name("customer.index");
Route::get('/customer/create', [CustomerController::class, 'create'])->name("customer.create");
Route::post('/customer/store', [CustomerController::class, 'store'])->name("customer.store");

Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name("customer.edit");
Route::get('/customer/delete', [CustomerController::class, 'delete'])->name("customer.delete");