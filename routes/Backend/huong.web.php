<?php

//route for backend after login
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    #Crawler
    Route::get('/crawler', 'Backend\Crawler\CrawlerCtrl@index')->name('crawler');
    Route::get('/crawler/config', 'Backend\Crawler\CrawlerCtrl@configCrawler');
    Route::get('/crawler/configFilter', 'Backend\Crawler\CrawlerCtrl@configFilter');

    #category
    Route::get('/category', 'Backend\Category\CategoryCtrl@index')->name('category');

    #media
    Route::get('/media', 'Backend\Media\MediaCtrl@index')->name('media');
    Route::get('/media/media-new', 'Backend\Media\MediaCtrl@addNew');
});



//rest route
Route::group(['prefix' => 'rest', 'middleware' => ['web', 'auth']], function () {
    //user
    Route::get('/user/getAllUser', 'Backend\Rest\UserCtrl@getAllUser');
    Route::get('/user/countUser', 'Backend\Rest\UserCtrl@countUser');
    Route::post('/user/insertUser', 'Backend\Rest\UserCtrl@insertUser');
    Route::put('/user/trashUser', 'Backend\Rest\UserCtrl@trashUser');
    Route::delete('/user/deleteUser', 'Backend\Rest\UserCtrl@deleteUser');
    Route::put('/user/publishUser', 'Backend\Rest\UserCtrl@publishUser');

    //ou
    Route::get('/ou/getAllOu', 'Backend\Rest\OuCtrl@getAllOu');
    Route::post('/ou/addNewOu', 'Backend\Rest\OuCtrl@insert');
    Route::put('/ou/editOu', 'Backend\Rest\OuCtrl@editOu');

    //crawler
    Route::get('/crawler', 'Backend\Rest\CrawlerCtrl@getAllCrawler');


    #categories
    Route::post('/category', 'Backend\Rest\CategoryCtrl@insertCategory');
    Route::put('/category', 'Backend\Rest\CategoryCtrl@updateCategory');
    Route::get('/category', 'Backend\Rest\CategoryCtrl@getAllCategory');
    Route::delete('/category/{id}', 'Backend\Rest\CategoryCtrl@deleteCategory');


    #media
    Route::post('/media/addnew', 'Backend\Rest\MediaCtrl@mediaAddNew');
});

