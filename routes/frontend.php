<?php

use App\Http\Controllers\User\FrontEndController;
use App\Http\Controllers\User\IndexController;
use Illuminate\Support\Facades\Route;


Route::get('/', IndexController::class)->name('users.dashboard');

Route::get('/shop', [FrontEndController::class, 'shop'])->name('shop');

Route::get('/blog', [FrontEndController::class, 'blog'])->name('blog');

Route::get('/about', [FrontEndController::class, 'about'])->name('about');

Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');

Route::get('/cart', [FrontEndController::class, 'cart'])->name('cart');

