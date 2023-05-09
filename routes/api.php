<?php

use App\Http\Controllers\Apis\User\CartController;
use App\Http\Controllers\Wishlist\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('products')->controller(CartController::class)->group(function (){
    Route::post('add', 'add');
});

Route::prefix('products')->controller(WishlistController::class)->group(function (){
    Route::post('addToWishlist', 'add');
});
