<?php

use App\Http\Controllers\Admin\AddressesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\RegionsController;
use App\Http\Controllers\Admin\SpecsController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix('admins')->name('admins.')->middleware(['auth:admin', 'verified:admin'])->group(function() {
    Route::prefix('categories')->name('categories.')->controller(CategoriesController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::prefix('{category}')->group(function() {
            Route::put('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
            Route::get('show/{slug?}', 'show')->name('show');
            Route::get('edit/{slug?}', 'edit')->name('edit');
        });
    });
});

Route::prefix('admins')->name('admins.')->middleware(['auth:admin', 'verified:admin'])->group(function() {
    Route::prefix('cities')->name('cities.')->controller(CitiesController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::prefix('{city}')->group(function() {
            Route::put('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
            Route::get('show/{slug?}', 'show')->name('show');
            Route::get('edit/{slug?}', 'edit')->name('edit');
        });
    });
});

Route::prefix('admins')->name('admins.')->middleware(['auth:admin', 'verified:admin'])->group(function() {
    Route::prefix('regions')->name('regions.')->controller(RegionsController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::prefix('{region}')->group(function() {
            Route::put('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
            Route::get('show/{slug?}', 'show')->name('show');
            Route::get('edit/{slug?}', 'edit')->name('edit');
        });
    });
});

Route::prefix('admins')->name('admins.')->middleware(['auth:admin', 'verified:admin'])->group(function() {
    Route::prefix('specs')->name('specs.')->controller(SpecsController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::prefix('{spec}')->group(function() {
            Route::put('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
            Route::get('show/{slug?}', 'show')->name('show');
            Route::get('edit/{slug?}', 'edit')->name('edit');
        });
    });
});
Route::prefix('admins')->name('admins.')->middleware(['auth:admin', 'verified:admin'])->group(function() {
    Route::prefix('users')->name('users.')->controller(UsersController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::prefix('{user}')->group(function() {
            Route::put('/', 'update')->name('update');
            Route::get('/', 'verify')->name('verify');
            Route::delete('/', 'destroy')->name('destroy');
            Route::get('show/{slug?}', 'show')->name('show');
            Route::get('edit/{slug?}', 'edit')->name('edit');
        });
    });
});
Route::prefix('admins')->name('admins.')->middleware(['auth:admin', 'verified:admin'])->group(function() {
    Route::prefix('addresses')->name('addresses.')->controller(AddressesController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::prefix('{address}')->group(function() {
            Route::put('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
            Route::get('show/{slug?}', 'show')->name('show');
            Route::get('edit/{slug?}', 'edit')->name('edit');
        });
    });
});

