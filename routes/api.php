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

Route::get('/gems', 'GemController@getGems');
Route::get('/gems/colors', 'GemController@getColorsGems');
Route::get('/monitors/gems/{idMonitor}', 'AchievementController@getGemsMonitor');

Route::get('monitors/category/{idCategory}', 'MonitorController@getMonitorsByCategory');

Route::get('/menus', 'MenuController@index');

Route::get('/monitors', 'MonitorController@getMonitors');
Route::get('/monitors/{idMonitor}', 'MonitorController@monitorDetail');
// Route::get('/monitors/qrcode/{idUser}', 'MonitorController@getIdMonitor');

Route::get('/monitors/courses/{idMonitor}', 'CourseController@getCourses');
Route::post('/monitors/email', 'SendMailMonitorController@send');

Route::get('/category', 'CategoryController@index');
Route::get('/explanations', 'ExplanationController@index');
Route::get('/search_city', 'CityController@searchCity');

// Route::put('/user/{id}', 'UserController@update');
Route::get('/user/{id}', 'API\UserController@getUser');
Route::get('/user/email/{email}', 'API\UserController@validateEmail');

Route::get('/search/course', 'CourseController@find');

Route::post('/ratings/monitor', 'RatingsController@evaluation');

Route::put('/user/{id}', 'API\UserController@updateDados');
Route::get('/userContact/{id}', 'API\UserController@getUserContact');
Route::put('/userContact/{id}', 'API\UserController@updateContact');
Route::put('/userPassword/{id}', 'API\UserController@updatePassword');

Route::post('/course/{id}', 'CourseController@deleteCourse');
Route::put('/course/{id}', 'CourseController@updateCourse');
Route::get('/monitors/course/{idCourse}', 'CourseController@getCourse');
