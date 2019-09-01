<?php
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::view('/', 'frontpage')->name('home');
Route::view('/calendar/', 'calendar')->name('calendar');

Route::get('/units/', 'UnitController@index')->name('units');
Route::get('/units/{unit}', 'UnitController@viewUnit')->name('view-unit');

Route::post('/search/', 'PageController@searchPages');

// Catch-all route - find a page which matches or 404
Route::any('/{page}', 'PageController@showPage')->where('page', '.*')->name('page');
