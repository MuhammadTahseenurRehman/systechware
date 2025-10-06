<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('index');
});

Route::get('/listing', [ProductController::class, 'listing']);
Route::get('/product/{id}', [ProductController::class, 'show']);

// Checkout page route
Route::get('/checkout', function () {
    return view('product.product-checkout');
});
// Cart page route
Route::get('/cart', function () {
    return view('product.product-cart');
});

Route::prefix('api')->group(function () {
    Route::get('/products', [ProductController::class, 'apiIndex']);
    Route::get('/products/{id}', [ProductController::class, 'apiShow']);
});
