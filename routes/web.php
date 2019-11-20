<?php
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', 'PageController@frontpage')->name('home');
Route::view('/calendar/', 'page.calendar')->name('calendar');

Route::get('/units/', 'UnitController@index')->name('units');
Route::get('/units/{unit}', 'UnitController@viewUnit')->name('view-unit');

Route::group(['prefix' => 'form'], function() {
	Route::get('/', 'FormController@index');

	Route::get('/accident/', 'FormController@accidentCreate')->name('accidentForm');
	Route::post('/accident/', 'FormController@accidentStore')->name('accidentFormStore');

	Route::get('/contact/', 'FormController@contactCreate');
	Route::post('/contact/', 'FormController@contactStore');
});

Route::post('/search/', 'PageController@searchPages');

// Catch-all route - find a page which matches or 404
Route::any('/{page}', 'PageController@showPage')->where('page', '.*')->name('page');
