<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
  Route::post('users/details', 'API\UserController@details');
  Route::put('users/update', 'API\UserController@update');
});

Route::get('/menus', 'MenuController@index');
// Route::get('/gems', 'GemController@index');
// Route::get('/students', 'StudentController@index');
Route::get('/explanations', 'ExplanationController@index');
// Route::get('/levels', 'LevelController@index');

//Rota para encontrar cidade do usuario 
Route::get('/search_city/{name}', 'CityController@searchCity');