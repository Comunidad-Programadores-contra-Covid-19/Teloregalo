<?php

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
/* Auth::routes(); */
// Authentication Routes Client...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration user client Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Authentication Routes Store...
Route::get('login/stores', 'Auth\LoginStoreController@showLoginForm')->name('login.stores');
Route::post('login/stores', 'Auth\LoginStoreController@login');

/* Route::post('logout', 'Auth\LoginController@logout')->name('logout'); */
// Registration Comercios Routes...
Route::get('stores/register', 'Auth\RegisterStoreController@showStoreRegistrationForm');
Route::post('stores/register', 'Auth\RegisterStoreController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/* Route::get('/home', 'HomeController@index')->name('home');
 */
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('register/google', 'Auth\RegisterController@redirectToProvider');
Route::get('register/google/callback', 'Auth\RegisterController@handleProviderCallback');


Route::resource('offers', 'OfferController');

Route::resource('stores', 'StoreController');

Route::resource('otps', 'OtpController');

Route::delete('/otps', 'OtpController@destroy');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/chooseRegistration', function(){
    return view('auth.storeOrClient');
});

Route::group(['middleware' => ['auth', 'store']], function () {
    Route::get('stores', 'StoreController@create')->name('stores');
    Route::put('update/{id}', 'StoreController@update')->name('stores.update');
});

/* 
Route::group(['middleware' => ['auth', 'client']], function () {
    Route::get('otps', 'OtpController@create')->name('otps');
    //Route::get('otps', 'OtpController@create')->name('otps.create');
}); */

/* Route::group(['middleware' => ['auth', 'client']], function () {
    Route::get('otp', 'OtpController@create');
    Route::get('/otp/create', 'OtpController@create');
}); */

/*Route::middleware(['auth', 'client'])->group(function () {
    Route::get('otp', 'OtpController@create');
});*/
