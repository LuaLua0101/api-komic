<?php
Route::get('/', 'Admins\AdminController@index')->name('home');

Route::prefix('/ad')->group(function () {

    Route::get('/login', 'Admins\AdminController@getLogin')->name('adgetLogin');
    Route::post('/login', 'Admins\AdminController@postLogin')->name('adpostLogin');

    Route::middleware(['check_admin'])->group(function () {
        // Home
        Route::get('/', 'Admins\AdminController@getHome')->name('adgetHome');
        // Route::post('/config', 'AdminController@updateConfig')->name('adupdateConfig');

        // Jobs
        Route::prefix('/job')->group(function () {
            Route::get('/list/{query?}', 'Admins\JobController@index')->name('adgetListJob');

            Route::get('/add', 'Admins\JobController@getAddJob')->name('adgetAddJob');
            Route::post('/add', 'Admins\JobController@postAddJob')->name('adpostAddJob');

            Route::get('/edit/{id}', 'Admins\JobController@getEditJob')->name('adgetEditJob');
            Route::post('/edit/{id}', 'Admins\JobController@postEditJob')->name('adpostEditJob');

            Route::get('/del/{id}', 'Admins\JobController@getDelJob')->name('adgetDelJob');
        });
    });

});