<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/orders', [OrderController::class, 'store']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);


});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/orders', [OrderController::class, 'store']); // Order Now
    Route::get('/orders', [OrderController::class, 'index']); // User orders
});
