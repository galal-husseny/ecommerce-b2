<?php

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');


require __DIR__.'/users.auth.php';
require __DIR__.'/sellers.auth.php';
require __DIR__ . '/admins.auth.php';
require __DIR__ . "/frontend.php";
require __DIR__ . "/sellers.frontend.php";
