<?php
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('me', 'Api\AuthController@me');

    Route::post('comics', 'Api\ApiController@testApi')->middleware(['can:get-transactions']);
});

Route::post('login', ['as' => 'login', 'uses' => 'Api\AuthController@login']);
Route::post('register', 'Api\AuthController@signup');
Route::get('otp', 'Api\ApiController@sendOTP');