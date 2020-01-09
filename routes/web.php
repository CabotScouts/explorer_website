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
	Route::get('/{unit}', 'UnitController@viewUnitIndex')->name('view-unit');
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
  Route::get('/', 'InstagramController@index')->name('instagram');
  Route::get('/login', 'InstagramController@instagramRedirect');
  Route::get('/login/redirect', 'InstagramController@instagramCallback')->name('instagram-redirect');
  Route::get('/deauth', 'InstagramController@instagramDeauthorise');
  Route::get('/delete-data', 'InstagramController@instagramDeleteDate');
  Route::get('/force-update', 'InstagramController@updatePosts')->middleware('auth');
});

Route::post('/search/', 'PageController@searchPages');
Route::get('/sitemap.xml', 'PageController@sitemap');
// Catch-all route - find a page which matches or 404
Route::any('/{page}', 'PageController@showPage')->where('page', '.*')->name('page');
