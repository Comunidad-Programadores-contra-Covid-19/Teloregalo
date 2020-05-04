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

 /* Auth::routes(['verify' => true]);  */
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
    Route::get('stores/register', 'Auth\RegisterStoreController@showStoreRegistrationForm')->name('register.stores');;
    Route::post('stores/register', 'Auth\RegisterStoreController@register');
    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    



/* Route::get('/home', 'HomeController@index')->name('home');
 */
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.auth');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


Route::resource('offers', 'OfferController')/* ->middleware('verified') */;

Route::resource('stores', 'StoreController')/* ->middleware('verified') */;

Route::resource('otps', 'OtpController')/* ->middleware('verified') */;

Route::get('create/{idstore}/{idclient}', 'OtpController@create')->name('otps.create')/* ->middleware('verified') */;

Route::delete('/otps/{idstore}', 'OtpController@destroy')/* ->middleware('verified') */;

Route::get('/', 'HomeController@index')->name('home')/* ->middleware('verified') */;



Route::group(['middleware' => ['auth', 'store']], function () {
    Route::get('stores', 'StoreController@create')->name('stores')/* ->middleware('verified') */;
    Route::put('update/{id}', 'StoreController@update')->name('stores.update')/* ->middleware('verified') */;
});

Route::group(['middleware' => ['auth', 'client']], function () {
    Route::get('otps', 'OtpController@create')/* ->middleware('verified') */;
});



Route::get('/preguntasFrecuentes', function(){
    return view('teloregalo.preguntasFrecuentes');
});

Route::get('/donar', function () {
    return view('teloregalo.donar');
});
