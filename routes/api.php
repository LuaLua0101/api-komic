<?php
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('me', 'Api\AuthController@me');

    //course topic
    Route::get('get4CourseTopics', 'Api\CourseController@get4CourseTopics');

    //courses
    Route::get('getGreatCourse', 'Api\CourseController@getGreatCourse');
    Route::get('getHotestSkill', 'Api\CourseController@getHotestSkill');
    Route::get('getCourse4Manager', 'Api\CourseController@getCourse4Manager');
    Route::get('getCourse4Salary', 'Api\CourseController@getCourse4Salary');
    Route::get('getHappyCourse', 'Api\CourseController@getHappyCourse');
    Route::get('getSavedCourses', 'Api\CourseController@getSavedCourses');
    Route::get('getMyCourses', 'Api\CourseController@getMyCourses');
    Route::get('getCourseDetail/{id}', 'Api\CourseController@getCourseDetail');
    Route::get('getCourses/{type?}', 'Api\CourseController@getCourses');

    //jobs
    Route::get('getNearestJob', 'Api\JobController@getNearestJob');
    Route::get('getHotestJob', 'Api\JobController@getHotestJob');
    Route::get('getNewestJob', 'Api\JobController@getNewestJob');
    Route::get('getManagerJob4U', 'Api\JobController@getManagerJob4U');
    Route::get('getJob4U', 'Api\JobController@getJob4U');
    Route::get('getJobDetail/{id}', 'Api\JobController@getJobDetail');
    Route::get('getSameJob', 'Api\JobController@getSameJob');
    Route::get('getSavedJob', 'Api\JobController@getSavedJobs');

    //companies
    Route::get('getNearestCompany', 'Api\CompanyController@getNearestCompany');
    Route::get('getCompany4U', 'Api\CompanyController@getCompany4u');
    Route::get('getCompanyNeedU', 'Api\CompanyController@getCompanyNeedU');
    Route::get('getSavedCompany', 'Api\CompanyController@getSavedCompany');

    //test & ebook
    Route::get('getEbook4Salary', 'Api\TestEbookController@getEbook4Salary');
    Route::get('getEbook4U', 'Api\TestEbookController@getEbook4U');
    Route::get('getNewestTest', 'Api\TestEbookController@getNewestTest');
    Route::get('getWhoAreYouTest', 'Api\TestEbookController@getWhoAreYouTest');

    Route::get('getTestDetail/{id}', 'Api\TestEbookController@getTestDetail');
    Route::get('getTests/{type?}', 'Api\TestEbookController@getTests');

    //user
    Route::get('getPersonalInfo', 'Api\UserController@getPersonalInfo');
    Route::get('updatePersonalInfo', 'Api\UserController@updatePersonalInfo');
    Route::get('getMyCV', 'Api\UserController@getMyCV');
    Route::post('updateFCM', 'Api\UserController@updateFCM');

    Route::get('getActiveUser', 'Api\UserController@getActiveUser');
    Route::post('postActiveUser', 'Api\UserController@postActiveUser');

    Route::post('comics', 'Api\ApiController@testApi')->middleware(['can:get-transactions']);
});

Route::post('login', ['as' => 'login', 'uses' => 'Api\AuthController@login']);
Route::post('register', 'Api\AuthController@signup');
Route::get('otp', 'Api\ApiController@sendOTP');