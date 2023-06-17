<?php

Route::group([
    'namespace' => 'Auth',
], function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login_page');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::group([
    'middleware' => [
        'auth:admin',
        'ensure_has_permission',
    ],
], function () {
    // Resource routes

    // Roles and permissions route
    Route::resource('roles', RoleController::class);
    Route::resource('admins', AdminUserController::class);
    Route::resource('permissions', PermissionController::class);

    Route::get('itineraries/createload', 'ItinerariesController@createload')->name('itineraries.createload');
    Route::post('itineraries/additineraryday', 'ItinerariesController@additineraryday')->name('itineraries.additineraryday');
    Route::post('itineraries/showitinerarydays', 'ItinerariesController@showitinerarydays')->name('itineraries.showitinerarydays');
    Route::post('itineraries/deleteday', 'ItinerariesController@deleteday')->name('itineraries.deleteday');
    Route::post('itineraries/submitdayform', 'ItinerariesController@submitdayform')->name('itineraries.submitdayform');
    Route::post('itineraries/addactivity', 'ItinerariesController@addactivity')->name('itineraries.addactivity');
    Route::post('itineraries/showitineraryactivities', 'ItinerariesController@showitineraryactivities')->name('itineraries.showitineraryactivities');
    Route::post('itineraries/deleteactivity', 'ItinerariesController@deleteactivity')->name('itineraries.deleteactivity');
    Route::post('itineraries/submitstarttimeform', 'ItinerariesController@submitstarttimeform')->name('itineraries.submitstarttimeform');
    Route::post('itineraries/submitendtimeform', 'ItinerariesController@submitendtimeform')->name('itineraries.submitendtimeform');
    Route::post('itineraries/submitdescriptionform', 'ItinerariesController@submitdescriptionform')->name('itineraries.submitdescriptionform');
    Route::resource('itineraries', ItinerariesController::class);
    Route::resource('users', UsersController::class);

    // Route::put('itineraries/update/{id}', 'ItinerariesController@update')->name('itineraries.update');
    // Route::get('itineraries/destroy/{id}', 'ItinerariesController@destroy')->name('itineraries.destroy');

    Route::resource('categories', CategoriesController::class);
    Route::resource('tags', TagsController::class);
    Route::resource('itinerarylocation', ItineraryLocationsController::class);

    // system settings
    Route::resource('homesettings', HomeSettingController::class);
    Route::post('/homesettings/updatepictures', 'HomeSettingController@updatepictures')->name('homesettings.updatepictures');
    Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::post('/settings/update', 'SettingController@update')->name('settings.update');
    Route::post('/settings/theme-setting', 'SettingController@themeSetting')->name('settings.themesetting');

    // Media Library
    Route::get('media-libarary', 'AdminController@media')->name('media');

    // extra routes.


    // Routes
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('home', 'AdminController@index')->name('dashboard');
    Route::get('dashboard', 'AdminController@index')->name('dashboard');

    // Itineries

    // Route::get('/itineraries/create', 'Itineraries@create')->name('itineraries.create');

    // Route::get('/itineraries/create', function(){
    //     $pageTitle = "Create Itinerary";
    //     return view('admin.itineraries.create')->with('pageTitle', $pageTitle);
    // })->name('itineraries.create');
    // Route::post('/itineraries/store', 'ItinerariesController@store')->name('admin.itineraries.store');

    // // Route::get('/itineraries', function(){
    // //     $pageTitle = "My Itineraries";
    // //     return view('admin.itineraries.index')->with('pageTitle', $pageTitle);
    // // })->name('itineraries.index');

    // // Route::get('/itineraries/edit', 'AdminController@index')->name('itineraries.edit');
    // // Route::get('/itineraries/store', 'AdminController@index')->name('itineraries.store');

});
