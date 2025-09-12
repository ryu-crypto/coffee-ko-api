<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController as WebOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController; // ✅ Import HomeController

// ✅ Home Route now uses HomeController@index
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Orders (protected by auth)
Route::middleware('auth')->group(function () {
    Route::post('/orders', [WebOrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [WebOrderController::class, 'index'])->name('orders.index');
});

// Cart (protected by auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    // ✅ Apply Loyalty Voucher
    Route::post('/cart/voucher', [CartController::class, 'applyVoucher'])->name('cart.applyVoucher');

});
