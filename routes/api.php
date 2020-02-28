<?php

Route::get('test-api', 'Api\ApiController@testApi');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });