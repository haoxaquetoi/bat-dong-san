<?php

//route for backend after login
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    #quang cao
    Route::get('/advertising', 'Backend\Advertising\AdvertisingCtrl@main')->name('advertising');
    Route::get('/advertising/list', 'Backend\Advertising\AdvertisingCtrl@all');
    Route::get('/advertising/single', 'Backend\Advertising\AdvertisingCtrl@single');
    #tin bài
    Route::get('/article', 'Backend\Article\ArticleCtrl@main')->name('article');
    Route::get('/article/list', 'Backend\Article\ArticleCtrl@all');
    Route::get('/article/singleNews', 'Backend\Article\ArticleCtrl@singleArticleNews');
    Route::get('/article/singleProduct', 'Backend\Article\ArticleCtrl@singleArticleProduct');
    #tin bài
    Route::get('/setting', 'Backend\Setting\SettingCtrl@main')->name('setting');
    Route::get('/setting/info', 'Backend\Setting\SettingCtrl@settingInfo');
    Route::get('/setting/email', 'Backend\Setting\SettingCtrl@settingEmail');
});

