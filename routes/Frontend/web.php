<?php

//Danh sách router của frontend: Thu tu dat theo muc uu tien
Route::get('/', 'Frontend\FrontendCtrl@homePage');


Route::get('/thong-tin-lien-he', 'Frontend\ContactCtrl@main');
Route::get('/{catSlug}/{catID}/{artSlug}/{artID}', 'Frontend\SingleArticleCtrl@main')->where([
    'catID' => '[0-9]+',
    'artID' => '[0-9]+'
]);
Route::get('/tags/{tagName}', 'Frontend\SingleTagCtrl@main');
Route::get('/{catSlug}/{catID}', 'Frontend\SingleCategoryCtrl@main')->where('catID', '[0-9]+');
Route::get('/tim-kiem', 'Frontend\SearchCtrl@main');


//rest route

Route::get('rest/getAllArticle', 'Frontend\Rest\ArticleCtrl@getAllArticle');


Route::get('rest/refreshCaptcha', 'Frontend\Rest\CaptchaCtrl@refreshCaptcha');
Route::post('rest/sendFeedBack', 'Frontend\Rest\FrontendCtrl@sendFeedBack');






