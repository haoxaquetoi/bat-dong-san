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
    #setting
    Route::get('/setting', 'Backend\Setting\SettingCtrl@main')->name('setting');
    Route::get('/setting/info', 'Backend\Setting\SettingCtrl@settingInfo');
    Route::get('/setting/email', 'Backend\Setting\SettingCtrl@settingEmail');
    #feedback
    Route::get('/feedback', 'Backend\feedback\FeedbackCtrl@main')->name('feedback');
    Route::get('/feedback/list', 'Backend\feedback\FeedbackCtrl@all');
    #setting feedback
    Route::get('/settingFeedback', 'Backend\settingFeedback\settingFeedbackCtrl@main')->name('settingFeedback');
    Route::get('/settingFeedback/list', 'Backend\settingFeedback\settingFeedbackCtrl@all');
    
});

