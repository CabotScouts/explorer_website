<?php

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
Auth::routes();

// Home
Route::get('/', function () {
    return view('frontpage');
})->name('home');

// Calendar
Route::get('/calendar/', function () {
    return view('calendar');
})->name('calendar');

// Units
Route::get('/units/{unit}', UnitController@showUnit)->name('units');

// Catch-all route - look for post with that name
Route::any('/{page?}', 'PageController@showPage');
