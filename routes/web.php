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
Route::get('/', 'HomeController@welcome');
Route::get('/signin', 'AuthController@signin');
Route::get('/callback', 'AuthController@callback');
Route::get('/signout', 'AuthController@signout');
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/login', function () {
    return view('login');
});

Route::get('/signUp', function () {
    return view('signUp');
});

Route::post('/signUp', 'PublicAuthController@signup');
Route::post('/login', 'PublicAuthController@login');
Route::post('/logout', 'PublicAuthController@logout');
Route::get('/accActivation', 'PublicAuthController@activateAccount');


Route::get('/testMail', 'PublicAuthController@testMail');
