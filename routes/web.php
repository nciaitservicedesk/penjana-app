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
Route::get('/', function () {
    return view('login');
});
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
Route::post('/forgotPass', 'PublicAuthController@forgotPass');

Route::get('/resetPass/{email}/{key}', 'PublicAuthController@viewResetPass');
Route::post('/resetPass', 'PublicAuthController@resetPass');
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
Route::post('/appStatus', 'ApplicationController@postAppStatus');
Route::get('/appeal', 'ApplicationController@viewAppeal');
Route::post('/appeal', 'ApplicationController@postAppeal');
Route::get('/supportDoc/{appId}/{filename}', 'FileStorageController@getSupportDoc');
Route::get('/appFile/{appId}/{filename}', 'FileStorageController@getAppFile');
Route::get('/letter/{appId}/{filename}', 'FileStorageController@getLetter');


// ----------- end public web route ---------

// ----------- start office web route ---------
Route::get('/officer/signin', 'AuthController@signin');
Route::get('/officer/appList', 'ApprovalController@viewAppList');
Route::get('/officer/viewDetail/{appId}', 'ApprovalController@viewAppDetail');
Route::post('/officer/viewDetail/{appId}', 'ApprovalController@postAppDetail');
Route::get('/officer/viewAudit/{appId}', 'ApprovalController@viewAppAudit');
Route::get('/callback', 'AuthController@callback');

// ----------- end office web route ---------


// ----------- testing ---------
Route::get('/testMail', 'PublicAuthController@testMail');


Route::get('/testcode', function ()
{
    echo date('YmdHisv');
    echo date_default_timezone_get();
});
Route::get('/officer/bypass/{id}', 'ApprovalController@devBypass');
Route::get('/preview', 'ApplicationController@viewAppPreview');
Route::get('/previewpdf', 'ApplicationController@viewAppPreviewPdf');
Route::get('/testpdf', 'ApplicationController@testpdf');
