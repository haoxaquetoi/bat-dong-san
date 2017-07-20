<?php

//route for backend after login
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    #quang cao
    Route::get('/advertising', 'Backend\Advertising\AdvertisingCtrl@main')->name('advertising');
    Route::get('/advertising/single', 'Backend\Advertising\AdvertisingCtrl@single')->name('singleAadvertising');
    
    Route::get('/article', 'Backend\Article\ArticleCtrl@main')->name('article');
    Route::get('/article/list', 'Backend\Article\ArticleCtrl@all');
    Route::get('/article/singleNews', 'Backend\Article\ArticleCtrl@singleArticleNews');
    Route::get('/article/singleProduct', 'Backend\Article\ArticleCtrl@singleArticleProduct');
});

