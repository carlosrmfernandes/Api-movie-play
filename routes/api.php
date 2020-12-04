<?php

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::get('/', function () {
    echo "api rodando";
});

Route::group(['middleware' => ['apiJwt'], 'prefix' => 'auth',], function ($router) {
    //User
    Route::post('user-update/{id}', 'V1\\UserController@update');
    Route::get('user-delete/{id}', 'V1\\UserController@destroy');

    //Director
    Route::post('register-director', 'V1\\DirectorController@store');
    Route::post('director-update/{id}', 'V1\\DirectorController@update');
    Route::get('director-delete/{id}', 'V1\\DirectorController@destroy');

    //Actor
    Route::post('register-actor', 'V1\\ActorController@store');
    Route::post('actor-update/{id}', 'V1\\ActorController@update');
    Route::get('actor-delete/{id}', 'V1\\ActorController@destroy');

    //Classification
    Route::post('register-classification', 'V1\\ClassificationController@store');
    Route::post('classification-update/{id}', 'V1\\ClassificationController@update');
    Route::get('classification-delete/{id}', 'V1\\ClassificationController@destroy');


    //Movie
    Route::post('register-movie', 'V1\\MovieController@store');
    Route::post('movie-update/{id}', 'V1\\MovieController@update');
    Route::get('movie-delete/{id}', 'V1\\MovieController@destroy');
    Route::get('movie-filter', 'V1\\MovieController@index');
    Route::get('movie-show/{id}', 'V1\\MovieController@show');
});

Route::group(['prefix' => ''], function ($router) {
    Route::post('register-user', 'V1\\UserController@store');
    Route::post('login', 'V1\\AuthController@login');    
});

