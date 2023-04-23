<?php

use App\Http\Controllers\Admin\CategoriesController;
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
