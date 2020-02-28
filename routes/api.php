<?php

Route::get('test-api', 'Api\ApiController@testApi');
Route::get('comics', 'Api\ApiController@getComics');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });