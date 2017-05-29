<?php

Route::get('/', function()
{
    echo 2;
});

Route::group(['prefix' => 'backend'], function()
{

    Route::get('login', 'Backend\AuthController@getLogin');

    Route::post('login', 'Backend\AuthController@postLogin');
});
