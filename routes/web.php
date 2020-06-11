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

Auth::routes(['verify' => true]);
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
Route::get('stores/register', 'Auth\RegisterStoreController@showStoreRegistrationForm')->name('register.stores');
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

/*  Route::resource('stores', 'StoreController') ; */ //* ->middleware('verified') */


Route::resource('otps', 'OtpController')/* ->middleware('verified') */;

Route::get('create/{idstore}/{idclient}/{idOffer}', 'OtpController@create')->name('otps.create')->middleware('banned');

Route::delete('/otps/{idstore}', 'OtpController@destroy')->name('otps.destroy') /* ->middleware('verified') */;

Route::get('/', 'HomeController@index')->name('home');


Route::get('/stores', 'StoreController@index')->name('stores.index');

Route::get('/search', 'StoreController@search')->name('stores.search');

Route::get('store/{id}', 'StoreController@show')->name('stores.perfil');
Route::group(['middleware' => ['auth', 'store','banned']], function () {
    Route::get('stores/miPerfil', 'StoreController@renderPerfil')->name('stores.miPerfil')->middleware('verified');
    Route::get('stores/misVentas', 'StoreController@renderVentas')->name('stores.misVentas')->middleware('verified');
    Route::get('stores/misProductos', 'StoreController@renderProductos')->name('stores.misProductos')->middleware('verified');
    Route::put('updateImage/{id}', 'StoreController@updateImage')->name('stores.updateImage')->middleware('verified');
    Route::put('update/{id}', 'StoreController@update')->name('stores.update')->middleware('verified');



    Route::put('register/paso2/{id}', 'StoreController@registerTwo')->name('stores.updateRegister');

    Route::get('/procesar-pago', 'LinkMercadoPagoController@linked');
    Route::get('register/pasortwo', function () {
        return view('auth.registerStore2');
    });
});

Route::post('/verificar-pago', 'LinkMercadoPagoController@verificar')->name('verificar.pago');

Route::get('auth/banneduser', function () {
    return view('auth.banneduser');
});

Route::group(['middleware' => ['auth', 'client','verified','banned']], function () {
    Route::get('otps', 'OtpController@create')/* ->middleware('verified') */;
    Route::get('otps/cancel/{idOtp}', 'OtpController@clientCancel')->name('otp.cancel')/* ->middleware('verified') */;
    Route::get('/mi-perfil', 'ClientController@renderPerfil')->name('cliente.miperfil')/* ->middleware('verified') */;
    Route::get('/mis-regalos', 'ClientController@renderMisRegalos')->name('cliente.mis-regalos')/* ->middleware('verified') */;

    Route::put('/updateHero/{id}', 'ClientController@updateHero')->name('clientes.updateHero')/* ->middleware('verified') */;
    Route::put('/updateImageHero/{id}', 'ClientController@updateImage')->name('clientes.updateImage')/* ->middleware('verified') */;
});

Route::put('/reportar-cliente/{id}', 'ClientController@report')->name('cliente.reportar');

Route::post('/puntuacion/{rate}', 'StoreController@setPuntuacion')->name('puntuacion');

Route::get('/puntuacion', 'StoreController@getPuntuacion')->name('get-puntuacion');

Route::get('/quienes-somos', function () {
    return view('teloregalo.quienes-somos');
});
Route::get('/preguntas-frecuentes', function () {
    return view('teloregalo.preguntas-frecuentes');
});
Route::get('/donar', function () {
    return view('teloregalo.donar');
});

Route::get('/agradecimiento', function () {
    return view('teloregalo.agradecimiento');
});
Route::post('/agradecimiento', 'LinkMercadoPagoController@UserMailSend')->name('UserMail');
Route::get('/terminos-condiciones', function () {
    return view('teloregalo.terminos-condiciones');
});

Route::get('storage-link', function () {
    Artisan::call('cache:clear');
});

Route::get('/google9885af1ba3907d18', function () {
    return view('google9885af1ba3907d18.html');
});

Route::get('/enviar', 'sendEmailController@mandar');
