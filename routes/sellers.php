<?php

use App\Http\Controllers\Seller\CouponsController;
use App\Http\Controllers\Seller\IndexController;
use App\Http\Controllers\Seller\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/seller-central' , IndexController::class)->name('sellers.index');

Route::prefix('sellers')->name('sellers.')->middleware(['auth:seller', 'verified:seller'])->group(function() {
    Route::prefix('products')->name('products.')->controller(ProductsController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::prefix('{product}')->group(function() {
            Route::put('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
            Route::get('show/{slug?}', 'show')->name('show');
            Route::get('edit/{slug?}', 'edit')->name('edit');
        });
    });
    Route::resource('coupons', CouponsController::class);
});
