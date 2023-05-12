<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\FrontEndController;


Route::get('/', IndexController::class)->name('users.dashboard');

Route::get('/shop', [FrontEndController::class, 'shop'])->name('shop');

Route::get('/blog', [FrontEndController::class, 'blog'])->name('blog');

Route::get('/about', [FrontEndController::class, 'about'])->name('about');

Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');

Route::get('/cart', [CartController::class, 'cart'])->name('cart');

Route::get('/{product}', [FrontEndController::class, 'detail'])->name('product-details');


