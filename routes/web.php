<?php

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {
    require __DIR__.'/users.auth.php';
    require __DIR__.'/sellers.auth.php';
    require __DIR__ . '/admins.auth.php';
    require __DIR__ . "/admins.php";
    require __DIR__ . "/frontend.php";
    require __DIR__ . "/sellers.php";


});
Route::get('test',function(){
    phpinfo();
});
