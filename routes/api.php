<?php
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('me', 'Api\AuthController@me');

    //courses
    Route::get('getGreatCourse', 'Api\CourseController@getGreatCourse');
    Route::get('getHotestSkill', 'Api\CourseController@getHotestSkill');
    Route::get('getCourse4Manager', 'Api\CourseController@getCourse4Manager');
    Route::get('getCourse4Salary', 'Api\CourseController@getCourse4Salary');
    Route::get('getHappyCourse', 'Api\CourseController@getHappyCourse');
    Route::get('getSavedCourses', 'Api\CourseController@getSavedCourses');
    Route::get('getMyCourses', 'Api\CourseController@getMyCourses');

    //jobs
    Route::get('getNearestJob', 'Api\JobController@getNearestJob');
    Route::get('getHotestJob', 'Api\JobController@getHotestJob');
    Route::get('getNewestJob', 'Api\JobController@getNewestJob');
    Route::get('getManagerJob4U', 'Api\JobController@getManagerJob4U');
    Route::get('getJob4U', 'Api\JobController@getJob4U');
    Route::get('getSameJob', 'Api\JobController@getSameJob');
    Route::get('getSavedJob', 'Api\JobController@getSavedJobs');

    //companies
    Route::get('getNearestCompany', 'Api\CompanyController@getNearestCompany');
    Route::get('getCompany4U', 'Api\CompanyController@getCompany4u');
    Route::get('getSavedCompany', 'Api\CompanyController@getSavedCompany');

    //test & ebook
    Route::get('getEbook4Salary', 'Api\TestEbookController@getEbook4Salary');
    Route::get('getEbook4U', 'Api\TestEbookController@getEbook4U');
    Route::get('getNewestTest', 'Api\TestEbookController@getNewestTest');
    Route::get('getWhoAreYouTest', 'Api\TestEbookController@getWhoAreYouTest');
    
    //user
    Route::get('getPersonalInfo', 'Api\UserController@getPersonalInfo');
    Route::get('getMyCV', 'Api\UserController@getMyCV');
    Route::post('updateFCM', 'Api\UserController@updateFCM');

    Route::post('comics', 'Api\ApiController@testApi')->middleware(['can:get-transactions']);
});

Route::post('login', ['as' => 'login', 'uses' => 'Api\AuthController@login']);
Route::post('register', 'Api\AuthController@signup');
Route::get('otp', 'Api\ApiController@sendOTP');