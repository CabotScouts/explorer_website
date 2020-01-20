<?php
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/login', 'AuthController@googleRedirect')->name('login');
Route::get('/login/redirect', 'AuthController@googleCallback')->name('google-redirect');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/', 'PageController@frontpage')->name('home');
Route::view('/calendar/', 'page.calendar')->name('calendar');

Route::group(['prefix' => 'units'], function() {
	Route::get('/', 'UnitController@showUnits')->name('units');
	Route::get('/{unit}', 'UnitController@viewUnitIndex')->name('unit.view');
	Route::get('/{unit}/programme', 'UnitController@viewUnitProgramme')->name('view-unit-programme');
	Route::get('/{unit}/contact', 'UnitController@viewUnitContact')->name('view-unit-contact');
	Route::get('/{unit}/{page}', 'UnitController@viewUnitPage')->where('page', '.*');
});

Route::group(['prefix' => 'form'], function() {
	// Route::get('/', 'FormController@index');

	Route::get('/accident/', 'FormController@accidentCreate')->name('accidentForm');
	Route::post('/accident/', 'FormController@accidentStore')->name('accidentFormStore');

	Route::get('/contact/', 'FormController@contactCreate');
	Route::post('/contact/', 'FormController@contactStore');
});

Route::group(['prefix' => 'instagram'], function() {
  Route::get('/manage', 'InstagramController@manage')->name('instagram.manage')->middleware('auth');
  Route::get('/login', 'InstagramController@redirect')->name('instagram.login')->middleware('auth');
  Route::get('/login/redirect', 'InstagramController@callback')->name('instagram.redirect')->middleware('auth');
  Route::get('/deauth', 'InstagramController@deauthorise');
  Route::get('/delete-data', 'InstagramController@deleteData');
  Route::get('/force-update', 'InstagramController@forceUpdate')->name('instagram.force-update')->middleware('auth');
  Route::get('/remove-media', 'InstagramController@removeMedia')->name('instagram.remove-media')->middleware('auth');
  Route::get('/refresh-token/{id}', 'InstagramController@refreshToken')->name('instagram.refresh-token')->middleware('auth');
});

Route::get('/photos', 'InstagramController@index')->name('instagram.index');
Route::get('/photos/album/{tag}', 'InstagramController@view')->name('instagram.view');

Route::post('/search/', 'PageController@searchPages');
Route::get('/sitemap.xml', 'PageController@sitemap');
// Catch-all route - find a page which matches or 404
Route::any('/{page}', 'PageController@showPage')->where('page', '.*')->name('page');
