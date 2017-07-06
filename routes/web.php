<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */



Route::group(['before' => 'auth'], function () {
    Route::get('/laravel-manager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-manager/upload', '\Unisharp\Laravelfilemanager\controllers\LfmController@upload');
    // list all lfm routes here...
});

require 'Backend/web.php';
require 'Frontend/web.php';
