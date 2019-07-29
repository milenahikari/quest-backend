<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
  Route::post('details', 'API\UserController@details');
  Route::put('update', 'API\UserController@update');
});

Route::get('/menus', 'MenuController@index');
Route::get('/gems', 'GemController@index');
Route::get('/students', 'StudentController@index');
Route::get('/explanations', 'ExplanationController@index');
Route::get('/levels', 'LevelController@index');