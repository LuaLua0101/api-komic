<?php
Route::get('/', 'Admins\AdminController@index')->name('home');
// Route::group(['prefix' => 'teach-me-series'], function () {
//     Route::get('/add', 'AdminController@getAddTeachMeSeries');
//     Route::post('/add', 'AdminController@postAddTeachMeSeries')->name('addTeachMeSeries');
//     Route::get('/detail', 'AdminController@getTeachMeSerieDetail');
// });