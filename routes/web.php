<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProyectoController;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

 Route::resource('proyecto', ProyectoController::class);



// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});



/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});


