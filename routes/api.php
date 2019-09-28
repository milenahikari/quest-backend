<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function () {
  Route::post('register/monitor', 'MonitorController@registerMonitor');
  Route::post('course', 'CourseController@store');
});

Route::get('/menus', 'MenuController@index');
Route::get('monitor/{id}/courses', 'MonitorController@listCourses');

Route::get('/category', 'CategoryController@index');
Route::get('/explanations', 'ExplanationController@index');
Route::get('/search_city', 'CityController@searchCity');
Route::get('/monitors', 'MonitorController@index');

Route::put('/user/{id}', 'UserController@update');

// Route::get('/gems', 'GemController@index');
// Route::get('/levels', 'LevelController@index');

//Rota para encontrar cidade do usuario 
