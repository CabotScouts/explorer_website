<?php
Route::domain(config('app.root_domain'))->group(function () {
  Route::prefix('admin')->group(function () {
      Voyager::routes();
  });

  Route::get('/', 'PageController@frontpage')->name('home');

  // Auth
  Route::get('/login', 'AuthController@googleRedirect')->name('login');
  Route::get('/login/redirect', 'AuthController@googleCallback')->name('google-redirect');
  Route::get('/logout', 'AuthController@logout')->name('logout');

  // Units
  Route::prefix('units')->group(function() {
  	Route::get('/', 'UnitController@showUnits')->name('units');
  	Route::get('/{unit}', 'UnitController@viewUnitIndex')->name('unit.view');
  	Route::get('/{unit}/programme', 'UnitController@viewUnitProgramme')->name('view-unit-programme');
  	Route::get('/{unit}/contact', 'UnitController@viewUnitContact')->name('view-unit-contact');
  	Route::get('/{unit}/{page}', 'UnitController@viewUnitPage')->where('page', '.*');
  });

  // Forms
  Route::prefix('form')->group(function() {
  	// Route::get('/', 'FormController@index');

  	Route::get('/accident', 'FormController@accidentCreate')->name('accidentForm');
  	Route::post('/accident', 'FormController@accidentStore')->name('accidentFormStore');

  	Route::get('/contact', 'FormController@contactCreate');
  	Route::post('/contact', 'FormController@contactStore');
  });

  // Instagram
  Route::prefix('instagram')->group(function() {
    Route::get('/manage', 'InstagramController@manage')->name('instagram.manage')->middleware('auth');
    Route::get('/force-update', 'InstagramController@forceUpdate')->name('instagram.force-update')->middleware('auth');
    Route::get('/remove-media', 'InstagramController@removeMedia')->name('instagram.remove-media')->middleware('auth');
    Route::get('/refresh-token/{id}', 'InstagramController@refreshToken')->name('instagram.refresh-token')->middleware('auth');

    // App Callbacks
    Route::get('/login', 'InstagramController@redirect')->name('instagram.login');
    Route::get('/login/redirect', 'InstagramController@callback')->name('instagram.redirect');
    Route::get('/deauth', 'InstagramController@deauthorise');
    Route::get('/delete-data', 'InstagramController@deleteData');
  });

  Route::get('/photos/{tag?}', 'InstagramController@view')->whereAlphaNumeric('tag')->name('instagram.view');

  // Shortlinks
  if(config('shortlinks.domain')) {
    Route::get('/go/{code}', 'ShortlinkController@redirect')->middleware('throttle:10,1');
  }
  else {
    Route::get('/go/{code}', 'ShortlinkController@redirect')->middleware('throttle:10,1')->name('shortlink.redirect');
  }

  Route::prefix('links')->middleware('auth')->group(function() {
    Route::get('/', 'ShortlinkController@index')->name('shortlink.index');
    Route::get('/create', 'ShortlinkController@createForm')->name('shortlink.create.form');
    Route::post('/create', 'ShortlinkController@createStore')->name('shortlink.create.store');
    Route::get('/edit/{id}', 'ShortlinkController@editForm')->name('shortlink.edit.form');
    Route::post('/edit/{id}', 'ShortlinkController@editStore')->name('shortlink.edit.store');
    Route::get('/delete/{id}', 'ShortlinkController@delete')->name('shortlink.delete');
  });

  Route::get('/source/flush/{id}', 'EventTestController@flushSource');
  Route::get('/source/update/{id}', 'EventTestController@updateSource');

  Route::get('/new/source/', 'EventTestController@newSource');
  Route::post('/new/source/', 'EventTestController@createSource')->name('test-createSource');

  Route::group(['prefix' => 'event_test'], function() {
    Route::get('/events/', 'EventTestController@listEvents');
    Route::get('/sources/', 'EventTestController@listSources');
    Route::get('/calendars/', 'EventTestController@listCalendars');

    Route::get('/new/source/', 'EventTestController@newSource');
    Route::post('/new/source/', 'EventTestController@createSource');

    Route::get('/add/event/', 'EventTestController@newEvent');
    Route::post('/add/event/', 'EventTestController@createEvent');

    Route::get('/add/calendar/', 'EventTestController@newCalendar');
    Route::post('/add/calendar/', 'EventTestController@createCalendar');
  });

  Route::group(['prefix' => 'calendar'], function() {
    Route::get('/', 'CalendarController@index');
    Route::get('/{calendar}', 'CalendarController@show');
    Route::get('/{calendar}.ics', 'CalendarController@export');
    Route::get('/{calendar}/render/{year?}/{month?}', 'CalendarController@month');
  });

  Route::post('/search', 'PageController@searchPages');
  Route::get('/sitemap.xml', 'PageController@sitemap');

  // Catch-all route - find a page which matches or 404
  Route::any('/{page}', 'PageController@showPage')->where('page', '.*')->name('page');
});

if(config('shortlinks.domain')) {
  Route::domain(config('shortlinks.domain'))->middleware('throttle:10,1')->group(function () {
    Route::get('/{code}', 'ShortlinkController@redirect')->name('shortlink.redirect');
  });
}
