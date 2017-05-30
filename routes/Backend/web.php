<?php

Route::group(['prefix' => 'backend'], function()
{
    Route::get('/', 'Backend\DashboardController@index');
    Route::get('dashboard', 'Backend\DashboardController@index');
    Route::get('crawler', 'Backend\CrawlerController@index');
});
