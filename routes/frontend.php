<?php

use App\Http\Controllers\User\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('users.dashboard');

