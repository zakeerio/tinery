<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeDislikeController;

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
Route::post('/removefavourites', [HomeController::class, 'removefavourites'])->name('removefavourites');

Route::get('/itineraries', function(){
    return view('frontend.pages.itineraries');
})->name('itineraries');

Route::get('/itinerary/{id}',[HomeController::class,'itinerary'])->name('itinerary');
Route::get('/create_itinerary_load',[HomeController::class,'create_itinerary_load'])->name('create_itinerary_load');
Route::get('/create_itinerary/{id}',[HomeController::class,'create_itinerary'])->name('create_itinerary');
Route::post('/itineraries_store',[HomeController::class,'itineraries_store'])->name('itineraries.store');

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
    Route::get('add-itineraray', function(){
        dd('additinerary');
    })->name('additinerary');
    // Add more routes as needed

    Route::post('/itinerary/{itinerary}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::post('/comments/{comment}/like-dislikes', [LikeDislikeController::class, 'store'])->name('likesDislikes.store');
    Route::put('/like-dislikes/{likeDislike}', [LikeDislikeController::class, 'update'])->name('likesDislikes.update');
    Route::delete('/like-dislikes/{likeDislike}', [LikeDislikeController::class, 'destroy'])->name('likesDislikes.destroy');


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
