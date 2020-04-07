<?php
Route::get('/', 'Admins\AdminController@index')->name('getHome');

Route::prefix('/ad')->group(function () {

    Route::get('/login', 'Admins\AdminController@getLogin')->name('adgetLogin');
    Route::post('/login', 'Admins\AdminController@postLogin')->name('adpostLogin');

    Route::middleware(['check_admin'])->group(function () {
        // Home
        Route::get('/', 'Admins\AdminController@getHome')->name('adgetHome');
        Route::get('/logout', 'Admins\AdminController@getLogout')->name('adgetLogout');
        // Route::post('/config', 'AdminController@updateConfig')->name('adupdateConfig');

        // Jobs
        Route::prefix('/job')->group(function () {
            Route::get('/list/{page?}/{query?}', 'Admins\JobController@index')->name('adgetListJob');

            Route::get('/add', 'Admins\JobController@getAddJob')->name('adgetAddJob');
            Route::post('/add', 'Admins\JobController@postAddJob')->name('adpostAddJob');

            Route::get('/edit/{id}', 'Admins\JobController@getEditJob')->name('adgetEditJob');
            Route::post('/edit/{id}', 'Admins\JobController@postEditJob')->name('adpostEditJob');

            Route::get('/del/{id}', 'Admins\JobController@getDelJob')->name('adgetDelJob');
        });

        // Companies
        Route::prefix('/company')->group(function () {
            Route::get('/list/{page?}/{query?}', 'Admins\CompanyController@index')->name('adgetListCompany');

            Route::get('/add', 'Admins\CompanyController@getAddCompany')->name('adgetAddCompany');
            Route::post('/add', 'Admins\CompanyController@postAddCompany')->name('adpostAddCompany');

            Route::get('/edit/{id}', 'Admins\CompanyController@getEditCompany')->name('adgetEditCompany');
            Route::post('/edit/{id}', 'Admins\CompanyController@postEditCompany')->name('adpostEditCompany');

            Route::get('/del/{id}', 'Admins\CompanyController@getDelCompany')->name('adgetDelCompany');
        });

        // Users
        Route::prefix('/user')->group(function () {
            Route::get('/list/{page?}/{query?}', 'Admins\UserController@index')->name('adgetListUser');

            Route::get('/add', 'Admins\UserController@getAddUser')->name('adgetAddUser');
            Route::post('/add', 'Admins\UserController@postAddUser')->name('adpostAddUser');

            Route::get('/edit/{id}', 'Admins\UserController@getEditUser')->name('adgetEditUser');
            Route::post('/edit/{id}', 'Admins\UserController@postEditUser')->name('adpostEditUser');

            Route::get('/del/{id}', 'Admins\UserController@getDelUser')->name('adgetDelUser');
        });

        // Course
        Route::prefix('/course')->group(function () {
            Route::get('/list/{page?}/{query?}', 'Admins\CourseController@index')->name('adgetListCourse');

            Route::get('/add', 'Admins\CourseController@getAddCourse')->name('adgetAddCourse');
            Route::post('/add', 'Admins\CourseController@postAddCourse')->name('adpostAddCourse');

            Route::get('/edit/{id}', 'Admins\CourseController@getEditCourse')->name('adgetEditCourse');
            Route::post('/edit/{id}', 'Admins\CourseController@postEditCourse')->name('adpostEditCourse');

            Route::get('/del/{id}', 'Admins\CourseController@getDelCourse')->name('adgetDelCourse');
        });

        // Test
        Route::prefix('/test')->group(function () {
            Route::get('/list/{page?}/{query?}', 'Admins\TestController@index')->name('adgetListTest');

            Route::get('/add', 'Admins\TestController@getAddTest')->name('adgetAddTest');
            Route::post('/add', 'Admins\TestController@postAddTest')->name('adpostAddTest');

            Route::get('/edit/{id}', 'Admins\TestController@getEditTest')->name('adgetEditTest');
            Route::post('/edit/{id}', 'Admins\TestController@postEditTest')->name('adpostEditTest');

            Route::get('/del/{id}', 'Admins\TestController@getDelTest')->name('adgetDelTest');
        });

        // Ebook
        Route::prefix('/ebook')->group(function () {
            Route::get('/list/{page?}/{query?}', 'Admins\EbookController@index')->name('adgetListEbook');

            Route::get('/add', 'Admins\EbookController@getAddEbook')->name('adgetAddEbook');
            Route::post('/add', 'Admins\EbookController@postAddEbook')->name('adpostAddEbook');

            Route::get('/edit/{id}', 'Admins\EbookController@getEditEbook')->name('adgetEditEbook');
            Route::post('/edit/{id}', 'Admins\EbookController@postEditEbook')->name('adpostEditEbook');

            Route::get('/del/{id}', 'Admins\EbookController@getDelEbook')->name('adgetDelEbook');
        });

        // Province
        Route::prefix('/province')->group(function () {
            Route::get('/list', 'Admins\ProvinceController@index')->name('adgetListProvince');
            Route::get('/detail/{id}', 'Admins\ProvinceController@getDetailProvince')->name('adgetDetailProvince');
        });

        // Degree
        Route::prefix('/degree')->group(function () {
            Route::get('/list', 'Admins\DegreeController@index')->name('adgetListDegree');
        });

        // Company Size
        Route::prefix('/company-size')->group(function () {
            Route::get('/list', 'Admins\CompanyController@getCompanySize')->name('adgetListCompanySize');
        });

        // Authors
        Route::prefix('/author')->group(function () {
            Route::get('/list/{page?}/{query?}', 'Admins\AuthorController@index')->name('adgetListAuthor');

            Route::get('/add', 'Admins\AuthorController@getAddAuthor')->name('adgetAddAuthor');
            Route::post('/add', 'Admins\AuthorController@postAddAuthor')->name('adpostAddAuthor');

            Route::get('/edit/{id}', 'Admins\AuthorController@getEditAuthor')->name('adgetEditAuthor');
            Route::post('/edit/{id}', 'Admins\AuthorController@postEditAuthor')->name('adpostEditAuthor');

            Route::get('/del/{id}', 'Admins\AuthorController@getDelAuthor')->name('adgetDelAuthor');
        });
    });

});