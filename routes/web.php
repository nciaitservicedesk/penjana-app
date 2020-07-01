<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'PublicAuthController@login');
//Route::get('/signin', 'AuthController@signin');
//Route::get('/callback', 'AuthController@callback');
//Route::get('/signout', 'AuthController@signout');
/*
Route::get('/', function () {
    return view('welcome');
});*/
// ----------- start public web route ---------
Route::get('/login', function () {
    return view('login');
});

Route::get('/signUp', function () {
    return view('signUp');
});

Route::get('/forgotPass', function () {
    return view('forgotPass');
});

Route::get('/resetPass', function () {
    return view('resetPass');
});

Route::post('/signUp', 'PublicAuthController@signup');
Route::post('/login', 'PublicAuthController@login');
Route::get('/logout', 'PublicAuthController@signout');
Route::get('/timeout', 'PublicAuthController@timeout');
Route::get('/accActivation', 'PublicAuthController@activateAccount');

Route::get('/formSct/{sctNo}', 'ApplicationController@viewAppSect');
Route::post('/sct1Save', 'ApplicationController@sct1Save');
Route::post('/sct2Save', 'ApplicationController@sct2Save');
Route::post('/sct3Save', 'ApplicationController@sct3Save');
Route::post('/sct4Save', 'ApplicationController@sct4Save');
Route::post('/sct5Save', 'ApplicationController@sct5Save');
Route::post('/sct6Save', 'ApplicationController@sct6Save');
Route::post('/sct7Save', 'ApplicationController@sct7Save');
Route::get('/appStatus', 'ApplicationController@viewAppStatus');
Route::get('/supportDoc/{appId}/{filename}', 'FileStorageController@getSupportDoc');

// ----------- end public web route ---------

// ----------- start office web route ---------
Route::get('/admo/login', 'AdmoAuthController@sct1Save');
Route::get('/callback', 'AuthController@callback');
// ----------- end office web route ---------


// ----------- testing ---------
Route::get('/testMail', 'PublicAuthController@testMail');


Route::get('/testcode', function ()
{
    echo date('YmdHisv');
    echo date_default_timezone_get();
});
