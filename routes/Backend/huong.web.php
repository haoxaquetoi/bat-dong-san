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
    Route::get('/crawler/configCrawler/{id}/{catID}', 'Backend\Crawler\CrawlerCtrl@configCrawler');
    Route::post('/crawler/updateCrawler', 'Backend\Crawler\CrawlerCtrl@updateCrawler');

    #article
    Route::get('/article', 'Backend\Article\ArticleCtrl@main')->name('article');
    Route::get('/article/singleNews', 'Backend\Article\ArticleCtrl@singleArticleNews');
    Route::get('/article/singleProduct', 'Backend\Article\ArticleCtrl@singleArticleProduct');

    Route::get('/article/singleNews/{id}', 'Backend\Article\ArticleCtrl@singleArticleNews')->where('id', '[\d]+');
    Route::get('/article/singleProduct/{id}', 'Backend\Article\ArticleCtrl@singleArticleProduct')->where('id', '[\d]+');
    
    
    #article crawler
    Route::get('/articleCrawler', 'Backend\Article\ArticleCtrl@listCrawler')->name('articleCrawler');
    Route::get('/articleCrawler/singleProductCrawler/{id}', 'Backend\Article\ArticleCtrl@singleProductCrawler')->where('id', '[\d]+');
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
    Route::get('/article/getAllPostDate', 'Backend\Rest\ArticleCtrl@getAllPostDate');
    Route::get('/article', 'Backend\Rest\ArticleCtrl@getAllArticle');
    Route::post('/article', 'Backend\Rest\ArticleCtrl@addNew');
    Route::put('/article', 'Backend\Rest\ArticleCtrl@edit');
    Route::put('/articleCrawler', 'Backend\Rest\ArticleCtrl@editCrawler');
    Route::delete('/article/{id}', 'Backend\Rest\ArticleCtrl@deleted');
    Route::put('/article/undelete{id}', 'Backend\Rest\ArticleCtrl@undelete');
    Route::put('/article/updateSticky/{id}', 'Backend\Rest\ArticleCtrl@updateSticky');
    Route::put('/article/updateCensored/{id}', 'Backend\Rest\ArticleCtrl@updateCensored');
    Route::get('/article/{id}', 'Backend\Rest\ArticleCtrl@getSingleArticle');
    Route::get('/article/getFeedback/{id}', 'Backend\Rest\ArticleCtrl@getFeedback');
    Route::put('/article/doReadedFB/{id}', 'Backend\Rest\ArticleCtrl@doReadedFB');


    #Tags
    Route::get('/tags', 'Backend\Rest\TagCtrl@getAll');


    ######feedback
    Route::get('/post/feedback', 'Backend\Rest\FeedbackCtrl@postFeedkback');
    Route::get('/post/feedback/{fdPostID}', 'Backend\Rest\FeedBackCtrl@postFeedkbackInfo');
    Route::put('/post/feedback/{fdPostID}', 'Backend\Rest\FeedBackCtrl@readedFeedBack');
    Route::delete('/post/feedback/{fdPostID}', 'Backend\Rest\FeedBackCtrl@deletePostFb');
});

Route::get('/test', 'Controller@test');
