<?php

use App\Http\Controllers\Seller\IndexController;
use App\Http\Controllers\Seller\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/seller-central' , IndexController::class)->name('sellers.index');

Route::prefix('sellers')->name('sellers.')->middleware(['auth:seller', 'verified:seller'])->group(function() {
    Route::resource('products', ProductsController::class);
});
