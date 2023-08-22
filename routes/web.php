<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeDislikeController;
use App\Http\Controllers\SitemapController;

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
Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/subscription', [HomeController::class, 'subscription'])->name('subscription');
Route::get('/term-of-use', [HomeController::class, 'term_of_use'])->name('term_of_use');
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');
Route::post('/subscription', [HomeController::class, 'subscription'])->name('subscription');
// User profile
Route::get('/user/{username}', [HomeController::class, 'username'])->name('username');

Route::post('/favourites', [HomeController::class, 'favourites'])->name('favourites');
Route::post('/removefavourites', [HomeController::class, 'removefavourites'])->name('removefavourites');
Route::get('/itineraries', [HomeController::class, 'itineraries'])->name('itineraries');
Route::post('/itineraries', [HomeController::class, 'filteritineraries'])->name('filteritineraries');

Route::get('/tags/{id}', [HomeController::class, 'slug_itineraries'])->name('slug_itineraries');


Route::get('/itineraries/{slug}',[HomeController::class,'itinerary'])->name('itinerary');

Route::post('/forgotpasswordcode',[HomeController::class,'forgotpasswordcode'])->name('forgotpasswordcode');
Route::post('/forgotpassworddb',[HomeController::class,'forgotpassworddb'])->name('forgotpassworddb');



Route::get('/discover', function(){
    return view('frontend.pages.discover');
})->name('discover');

Route::get('/about', function(){
    return view('frontend.pages.about');
})->name('about');

// Clear application cache:
Route::get('/optimizeclear', function() {
    Artisan::call('optimize:clear');
    return 'Application cache has been cleared';
});

// Route::post('register', 'RegisterController@store')->name('store');

Route::middleware('auth:user')->group(function () {
    // Routes that require user authentication
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profilepictureupdate', [UserController::class, 'profilepictureupdate'])->name('profilepictureupdate');
    Route::post('/profileupdate', [UserController::class, 'profileupdate'])->name('profileupdate');
    Route::post('/bioupdate', [UserController::class, 'bioupdate'])->name('bioupdate');
    Route::post('/socialprofileupdate', [UserController::class, 'socialprofileupdate'])->name('socialprofileupdate');
    Route::get('add-itineraray', function(){
        dd('additinerary');
    })->name('additinerary');
    // Add more routes as needed
    // Route::get('/create-itinerary/{id}',[HomeController::class,'create_itinerary'])->name('create-itinerary');
    Route::post('/itineraries_store',[HomeController::class,'itineraries_store'])->name('itineraries.store');

    Route::post('/single_itinerary_cover_upload',[HomeController::class,'single_itinerary_cover_upload'])->name('single.itinerary.cover.upload');
    Route::post('/single_itinerary_gallery_upload',[HomeController::class,'single_itinerary_gallery_upload'])->name('single.itinerary.gallery.upload');

    Route::post('/itinerary/{itinerary}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::post('/comments/{comment}/like-dislikes', [LikeDislikeController::class, 'store'])->name('likesDislikes.store');
    Route::put('/like-dislikes/{likeDislike}', [LikeDislikeController::class, 'update'])->name('likesDislikes.update');
    Route::delete('/like-dislikes/{likeDislike}', [LikeDislikeController::class, 'destroy'])->name('likesDislikes.destroy');


    Route::get('/create-itinerary-load',[HomeController::class,'create_itinerary_load'])->name('create-itinerary-load');

    Route::get('/create-itinerary',[HomeController::class,'create_itinerary'])->name('create-itinerary');
    Route::post('/itineraries_store',[HomeController::class,'itineraries_store'])->name('itineraries.store');
    Route::post('/itineraries_update',[HomeController::class,'itineraries_update'])->name('itineraries.update');
    Route::get('/edit-itinerary/{id}',[HomeController::class,'edit_itinerary'])->name('edit-itinerary');
    Route::post('/delete-itinerary/{id}',[HomeController::class,'delete_itinerary'])->name('delete-itinerary');
    Route::get('/delete_gallery_image/{id}',[HomeController::class,'delete_gallery_image'])->name('delete_gallery_image');
    Route::get('/create-itinerary-day/{id}',[HomeController::class,'create_itinerary_day'])->name('create-itinerary-day');
    Route::get('/deleteday/{id}/{id1}',[HomeController::class,'deleteday'])->name('deleteday');
    Route::post('/showdaysactivities',[HomeController::class,'showdaysactivities'])->name('showdaysactivities');
    Route::post('/addactivitydb',[HomeController::class,'addactivitydb'])->name('addactivitydb');
    Route::post('/addactivitydbdata',[HomeController::class,'addactivitydbdata'])->name('addactivitydbdata');
    Route::post('/deleteactivitydb',[HomeController::class,'deleteactivitydb'])->name('deleteactivitydb');


});

Route::group(['namespace' => 'Auth',], function () {

    // Authentication Routes...
    Route::post('loginemailexistance', 'LoginController@loginemailexistance')->name('loginemailexistance');
    Route::post('loginpasswordcheck', 'LoginController@loginpasswordcheck')->name('loginpasswordcheck');
    Route::get('login', 'LoginController@showLoginForm')->name('login_page');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('login_new', 'LoginController@login_new')->name('login_new');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register_page');
    Route::post('register', 'RegisterController@register')->name('register');
    Route::post('register_custom', 'RegisterController@register_custom')->name('register_custom');
    Route::post('registeremailexistance', 'RegisterController@registeremailexistance')->name('registeremailexistance');
    Route::post('registerusernameexistance', 'RegisterController@registerusernameexistance')->name('registerusernameexistance');
    Route::get('register/activate/{token}', 'RegisterController@confirm')->name('email_confirm');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

});

// Route::get('/', 'UserController@index')->name('home');
// Route::get('search', 'UserController@index')->name('search');
