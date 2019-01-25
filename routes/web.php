<?php

Auth::routes();
Route::view('/', 'frontpage')->name('frontpage');
Route::view('/calendar/', 'calendar')->name('calendar');

Route::get('/units/', 'UnitController@index')->name('units');
Route::get('/units/{unit}', 'UnitController@showUnit');

// Catch-all route - find a page which matches or 404
Route::any('/{page?}', 'PageController@showPage')->where('page', '[.*/]+');
