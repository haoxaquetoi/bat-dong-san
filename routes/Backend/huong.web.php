<?php

//route for backend after login
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {




    #category
    Route::get('/category', 'Backend\Category\CategoryCtrl@index')->name('category');

    #media
    Route::get('/media', 'Backend\Media\MediaCtrl@index')->name('media');
    Route::get('/media/media-new', 'Backend\Media\MediaCtrl@addNew');



    #Crawler
    Route::get('/crawler', 'Backend\Crawler\CrawlerCtrl@index')->name('crawler');
    Route::get('/crawler/configCrawler', 'Backend\Crawler\CrawlerCtrl@configCrawler');

    #article
    Route::get('/article', 'Backend\Article\ArticleCtrl@main')->name('article');
    Route::get('/article/singleNews', 'Backend\Article\ArticleCtrl@singleArticleNews');
    Route::get('/article/singleProduct', 'Backend\Article\ArticleCtrl@singleArticleProduct');

    Route::get('/article/singleNews/{id}', 'Backend\Article\ArticleCtrl@singleArticleNews')->where('id', '[\d]+');
    Route::get('/article/singleProduct/{id}', 'Backend\Article\ArticleCtrl@singleArticleProduct')->where('id', '[\d]+');
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




    #categories
    Route::post('/category', 'Backend\Rest\CategoryCtrl@insertCategory');
    Route::put('/category', 'Backend\Rest\CategoryCtrl@updateCategory');
    Route::put('/category', 'Backend\Rest\CategoryCtrl@updateCategory');
    Route::get('/category', 'Backend\Rest\CategoryCtrl@getAllCategory');
    Route::delete('/category/{id}', 'Backend\Rest\CategoryCtrl@deleteCategory');


    #media
    Route::post('/media/addnew', 'Backend\Rest\MediaCtrl@mediaAddNew');



    //crawler
    Route::get('/crawler', 'Backend\Rest\CrawlerCtrl@getAllCrawler');
    Route::post('/crawler/addnew', 'Backend\Rest\CrawlerCtrl@addNew');
    Route::put('/crawler/edit', 'Backend\Rest\CrawlerCtrl@edit');
    Route::put('/crawler/publish', 'Backend\Rest\CrawlerCtrl@publish');
    Route::delete('/crawler/{id}', 'Backend\Rest\CrawlerCtrl@delete');


    #article
    Route::post('/article', 'Backend\Rest\ArticleCtrl@addNew');
    Route::put('/article', 'Backend\Rest\ArticleCtrl@edit');
    Route::get('/article', 'Backend\Rest\ArticleCtrl@getAllArticle');
    Route::delete('/article/{id}', 'Backend\Rest\ArticleCtrl@deleted');
    Route::put('/article/updateSticky/{id}', 'Backend\Rest\ArticleCtrl@updateSticky');
    Route::put('/article/updateCensored/{id}', 'Backend\Rest\ArticleCtrl@updateCensored');
    Route::get('/article/{id}', 'Backend\Rest\ArticleCtrl@getSingleArticle');


    #Tags
    Route::get('/tags', 'Backend\Rest\TagCtrl@getAll');
});

Route::get('/test', 'Controller@test');
