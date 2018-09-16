<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'user'], function() {
    Route::post('/register', 'UserController@foundationRegister');
    Route::post('/info', 'UserController@getUserInformation');
});

Route::group(['prefix' => 'hobby'], function() {
    Route::post('/master', 'HobbyController@getHobbyMaster');
});