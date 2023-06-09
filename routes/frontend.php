<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductDetailsController;


Route::get('/', IndexController::class)->name('users.dashboard');

Route::get('/shop', [ShopController::class, 'shop'])->name('shop');

Route::name('users.')->group(function() {
    Route::middleware('auth:web')->prefix('address')->controller(AddressController::class)->name('address.')->group(function() {
        Route::get('/', 'index')->name('index')->middleware('address.redirection');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{address}', 'edit')->name('edit');
        Route::put('/update/{address}', 'update')->name('update');
        Route::delete('/destroy/{address}', 'destroy')->name('destroy');
    });
});

Route::get('/about', [AboutController::class, 'about'])->name('about');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

Route::get('/cart', [CartController::class, 'cart'])->name('cart')->middleware('auth:web');

Route::get('/{product}', [ProductDetailsController::class, 'detail'])->name('product-details');

Route::post('/cart/recipent', [OrderController::class, 'recipent'])->name('recipent')->middleware('auth:web');

Route::get('/cart/recipent', [OrderController::class, 'display'])->name('displayRecipent')->middleware('auth:web');

Route::post('/cart/placeOrder', [OrderController::class, 'placeorder'])->name('placeOrder')->middleware('auth:web');

Route::get('/cart/orderPlaced', [OrderController::class, 'orderPlaced'])->name('orderPlaced')->middleware('auth:web');

Route::name('users.')->group(function() {
    Route::middleware('auth:web')->prefix('orders')->controller(OrderController::class)->name('orders.')->group(function() {
        Route::get('/index', 'index')->name('index');
        Route::get('/show/{user}/{order}', 'show')->name('show');
        Route::get('/edit/{user}/{order}', 'edit')->name('edit');
        Route::put('/update/{order}', 'update')->name('update');
    });
});
