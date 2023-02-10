<?php

use App\Http\Controllers\Seller\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/seller-central' , IndexController::class)->name('sellers.index');
