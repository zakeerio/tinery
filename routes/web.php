<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('frontend.pages.home');
})->name('home');

Route::get('/itineraries', function(){
    return view('frontend.pages.itineraries');
})->name('itineraries');

Route::get('/itinerary/{id}',[HomeController::class,'itinerary'])->name('itinerary');

Route::get('/discover', function(){
    return view('frontend.pages.discover');
})->name('discover');

Route::get('/about', function(){
    return view('frontend.pages.about');
})->name('about');

// Route::post('register', 'RegisterController@store')->name('store');

Route::middleware('auth:user')->group(function () {
    // Routes that require user authentication
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    // Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/profile', function(){
        dd('user logged in');
    });

    // Add more routes as needed
});

Route::group(['namespace' => 'Auth',], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login_page');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('login_new', 'LoginController@login_new')->name('login_new');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register_page');
    Route::post('register', 'RegisterController@register')->name('register');
    Route::post('register_custom', 'RegisterController@register_custom')->name('register_custom');
    Route::get('register/activate/{token}', 'RegisterController@confirm')->name('email_confirm');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

});

// Route::get('/', 'UserController@index')->name('home');
// Route::get('search', 'UserController@index')->name('search');

