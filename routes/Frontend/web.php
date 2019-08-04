<?php

//Danh sách router của frontend: Thu tu dat theo muc uu tien
Route::get('/', 'Frontend\FrontendCtrl@homePage');


Route::get('/thong-tin-lien-he', 'Frontend\ContactCtrl@main');
Route::get('/tin-quan-tam', 'Frontend\ArticleProductInvolveCtrl@articleCare');

Route::get('/{catSlug}/{catID}/{artSlug}/{artID}', 'Frontend\SingleArticleCtrl@main')->where([
    'catID' => '[0-9]+',
    'artID' => '[0-9]+'
])->name('frontendArticle');
Route::get('/tags/{tagName}', 'Frontend\SingleTagCtrl@main');

// danh sach tin lien quan
Route::get('/tin-lien-quan/{artID}', 'Frontend\ArticleProductInvolveCtrl@main')->where('artID', '[0-9]+');

Route::get('/{catSlug}/{catID}', 'Frontend\SingleCategoryCtrl@main')->where('catID', '[0-9]+')->name('frontendCategory');
Route::get('/tim-kiem-tin-dang', 'Frontend\SearchCtrl@searchArticleNews');
Route::get('/tim-kiem-tin-bat-dong-san', 'Frontend\SearchCtrl@searchArticleProduct');

//rest route
Route::group(['prefix' => 'rest', 'middleware' => []], function () {
    Route::get('getAllArticle', 'Frontend\Rest\ArticleCtrl@getAllArticle');
    Route::get('refreshCaptcha', 'Frontend\Rest\CaptchaCtrl@refreshCaptcha');
    Route::post('sendFeedBack', 'Frontend\Rest\FrontendCtrl@sendFeedBack');
    
    //widget
    Route::get('frontend/widget/{positionCode}', 'Frontend\Rest\WidgetCtrl@listWidget')->where('positionCode', '[\w]+');
    // search
    Route::get('frontend/getParamsSearch', 'Frontend\Rest\SearchCtrl@getParamsSearch');
    // article
    Route::post('frontend/updateListCare/{artID}', 'Frontend\Rest\ArticleCtrl@updateListCare');
    Route::get('frontend/getAllArticleCare', 'Frontend\Rest\ArticleCtrl@getAllArticleCare');
    Route::get('frontend/checkArticleCare/{artID}', 'Frontend\Rest\ArticleCtrl@checkArticleCare');
    
    Route::get('frontend/getTotalVisitors', 'Frontend\Rest\AnalyticsCtrl@getTotalVisitors');
});


Route::get('frontend/widget', 'Frontend\WidgetCtrl@index');
Route::get('frontend/widget/type/{positionCode}/{type}', 'Frontend\WidgetCtrl@typeWidget')->where(['type', '[\w]+', 'positionCode', '[\w]+']);






