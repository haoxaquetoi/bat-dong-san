<?php

/**
 * 
 */
Route::group(['prefix' => 'backend'], function()
{
    Route::get('user', function()
    {
        echo 'backend/user';
    });


    /**
     * Module crawler
     */
    Route::get('crawler', function()
    {
        echo 'backend/crawler';
    });
    
    Route::get('crawler', 'App\Modules\Backend\Crawler\CrawlerCtrl@index');
});

