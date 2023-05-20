<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\ProductDetailsController;


Route::get('/', IndexController::class)->name('users.dashboard');

Route::get('/shop', [ShopController::class, 'shop'])->name('shop');

Route::get('/blog', [BlogController::class, 'blog'])->name('blog');

Route::get('/about', [AboutController::class, 'about'])->name('about');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

Route::get('/cart', [CartController::class, 'cart'])->name('cart')->middleware('auth:web');

Route::get('/{product}', [ProductDetailsController::class, 'detail'])->name('product-details');


