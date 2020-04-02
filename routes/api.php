<?php
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('me', 'Api\AuthController@me');
//courses
    Route::get('getGreatCourse', 'Api\CourseController@getGreatCourse');
    Route::get('getWhoAreYouCourse', 'Api\CourseController@getWhoAreYouCourse');
    Route::get('getHotestSkill', 'Api\CourseController@getHotestSkill');
    Route::get('getCourse4Manager', 'Api\CourseController@getCourse4Manager');
    Route::get('getCourse4Salary', 'Api\CourseController@getCourse4Salary');
    Route::get('getHappyCourse', 'Api\CourseController@getHappyCourse');
//jobs
    Route::get('getNearestJob', 'Api\CourseController@getNearestJob');
    Route::get('getHotestJob', 'Api\CourseController@getHotestJob');
    Route::get('getNewestJob', 'Api\CourseController@getNewestJob');
    Route::get('getManagerJob4U', 'Api\CourseController@getManagerJob4U');
    Route::get('getJob4U', 'Api\CourseController@getJob4U');
    Route::get('getSameJob', 'Api\CourseController@getSameJob');
    //companies
    Route::get('getNearestCompany', 'Api\CompanyController@getNearestCompany');
    Route::get('getCompany4U', 'Api\CompanyController@getCompany4u');
//test & ebook
Route::get('getEbook4Salary', 'Api\TestEbookController@getEbook4Salary');
Route::get('getEbook4U', 'Api\TestEbookController@getEbook4U');
Route::get('getNewestTest', 'Api\TestEbookController@getNewestTest');
//user
Route::get('getPersonalInfo', 'Api\UserController@getPersonalInfo');
Route::get('getMyCV', 'Api\UserController@getMyCV');

    Route::post('comics', 'Api\ApiController@testApi')->middleware(['can:get-transactions']);
});

Route::post('login', ['as' => 'login', 'uses' => 'Api\AuthController@login']);
Route::post('register', 'Api\AuthController@signup');
Route::get('otp', 'Api\ApiController@sendOTP');