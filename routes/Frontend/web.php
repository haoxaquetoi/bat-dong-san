<?php

//Danh sách router của frontend: Thu tu dat theo muc uu tien
Route::get('/', 'Frontend\FrontendCtrl@homePage');


Route::get('/thong-tin-lien-he', 'Frontend\ContactCtrl@main');
Route::get('/{catSlug}/{catID}/{artSlug}/{artID}', 'Frontend\SingleArticleCtrl@main')->where([
    'catID' => '[0-9]+',
    'artID' => '[0-9]+'
])->name('frontendArticle');
Route::get('/tags/{tagName}', 'Frontend\SingleTagCtrl@main');
Route::get('/{catSlug}/{catID}', 'Frontend\SingleCategoryCtrl@main')->where('catID', '[0-9]+')->name('frontendCategory');
Route::get('/tim-kiem', 'Frontend\SearchCtrl@main');


//rest route
Route::group(['prefix' => 'rest', 'middleware' => []], function () {
    Route::get('getAllArticle', 'Frontend\Rest\ArticleCtrl@getAllArticle');
    Route::get('refreshCaptcha', 'Frontend\Rest\CaptchaCtrl@refreshCaptcha');
    Route::post('sendFeedBack', 'Frontend\Rest\FrontendCtrl@sendFeedBack');
    
    //widget
    Route::get('frontend/widget/{positionCode}', 'Frontend\Rest\WidgetCtrl@listWidget')->where('positionCode', '[\w]+');
});


Route::get('frontend/widget', 'Frontend\WidgetCtrl@index');
Route::get('frontend/widget/type/{type}', 'Frontend\WidgetCtrl@typeWidget')->where('type', '[\w]+');






