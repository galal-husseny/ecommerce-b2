<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Apis\User\CartController;
use App\Http\Controllers\Apis\user\RegionsController;
use App\Http\Controllers\Apis\User\WishlistController;
use App\Http\Controllers\Apis\User\AddressesController;
use App\Http\Controllers\Apis\User\CouponController;
use App\Http\Controllers\Apis\User\OrderShippingController;

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
    Route::post('carts/handle', 'handle');
    Route::post('carts/getSubTotal', 'getSubTotal');
});

Route::prefix('products')->controller(WishlistController::class)->group(function (){
    Route::post('wishlists/handle', 'handle');
});

Route::prefix('products')->controller(AddressesController::class)->group(function (){
    Route::post('addresses/store', 'store');
});

Route::prefix('products')->controller(CouponController::class)->group(function (){
    Route::post('carts/applyCoupon', 'apply');
});

Route::post('regions', [RegionsController::class, 'index']);

Route::prefix('products')->controller(OrderShippingController::class)->group(function (){
    Route::post('carts/getShipping', 'shipping');
});
