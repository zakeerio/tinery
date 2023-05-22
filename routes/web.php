<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
// User profile
Route::get('/user/{username}', [HomeController::class, 'username'])->name('username');

Route::post('/favourites', [HomeController::class, 'favourites'])->name('favourites');

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
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/profileupdate', [UserController::class, 'profileupdate'])->name('profileupdate');
    Route::post('/bioupdate', [UserController::class, 'bioupdate'])->name('bioupdate');
    Route::post('/socialprofileupdate', [UserController::class, 'socialprofileupdate'])->name('socialprofileupdate');
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

