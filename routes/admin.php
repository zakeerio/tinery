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

    // system settings
    // Route::resource('settings', SettingController::class);
    Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::post('/settings/update', 'SettingController@update')->name('settings.update');
    Route::post('/settings/theme-setting', 'SettingController@themeSetting')->name('settings.themesetting');
    
    // Media Library
    Route::get('media-libarary', 'AdminController@media')->name('media');


    // Routes
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('home', 'AdminController@index')->name('dashboard');
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
});
