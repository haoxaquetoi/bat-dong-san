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
    #quang cao
    Route::get('/menu', 'Backend\Menu\MenuCtrl@main')->name('menu');
    Route::get('/menu/list', 'Backend\Menu\MenuCtrl@all');
    Route::get('/menu/single', 'Backend\Menu\MenuCtrl@single');
    #widget
    Route::get('/widget', 'Backend\Widget\WidgetCtrl@main')->name('widget');
    Route::get('/widget/list', 'Backend\Widget\WidgetCtrl@all');
    #tỉnh/thành phố
    Route::get('/city', 'Backend\City\CityCtrl@main')->name('city');
    Route::get('/city/list', 'Backend\City\CityCtrl@all');
    Route::get('/city/single', 'Backend\City\CityCtrl@single');    
    #Quận/Huyện
    Route::get('/district', 'Backend\District\DistrictCtrl@main')->name('district');
    Route::get('/district/list', 'Backend\District\DistrictCtrl@all');
    Route::get('/district/single', 'Backend\District\DistrictCtrl@single');    
    #Phường/Xã
    Route::get('/village', 'Backend\Village\VillageCtrl@main')->name('village');
    Route::get('/village/list', 'Backend\Village\VillageCtrl@all');
    Route::get('/village/single', 'Backend\Village\VillageCtrl@single');    
    #Đường phố
    Route::get('/street', 'Backend\Street\StreetCtrl@main')->name('street');
    Route::get('/street/list', 'Backend\Street\StreetCtrl@all');
    Route::get('/street/single', 'Backend\Street\StreetCtrl@single');    
});

