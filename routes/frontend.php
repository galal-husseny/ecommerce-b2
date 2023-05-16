<?php

use App\Http\Controllers\User\AboutPageController;
use App\Http\Controllers\User\BlogPageController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\ContactPageController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\ProductDetailsController;
use App\Http\Controllers\User\ShopPageController;
use Illuminate\Support\Facades\Route;


Route::get('/', IndexController::class)->name('users.dashboard');

Route::get('/shop', [ShopPageController::class, 'shop'])->name('shop');

Route::get('/blog', [BlogPageController::class, 'blog'])->name('blog');

Route::get('/about', [AboutPageController::class, 'about'])->name('about');

Route::get('/contact', [ContactPageController::class, 'contact'])->name('contact');

Route::get('/cart', [CartPageController::class, 'cart'])->name('cart');

Route::get('/{product}', [ProductDetailsController::class, 'detail'])->name('product-details');


