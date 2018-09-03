<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'register'], function () {
		Route::post('/create', 'Auth\RegisterController@create');
});

Route::group(['prefix' => 'user', "middleware"=> ['auth'] ], function () {
		Route::get('/', 'UserController@index');
		Route::get('/list', 'UserController@getList');
});

Route::group(['prefix' => 'graphic', "middleware"=> ['auth'] ], function () {
		Route::get('/random', 'Graphic\ReportController@index');
});

