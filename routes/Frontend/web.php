<?php

Route::get('/', function()
{
    echo 2;
});

Route::get('/home', 'App\Http\Controllers\HomeController@index');
