<?php


//Danh sách router của frontend 

Route::get('/', 'Frontend\FrontendCtrl@homePage');
Route::get('/tin-bai/{id}', 'Frontend\FrontendCtrl@singlePage')->where('id', '[0-9]+');
Route::get('/chuyen-muc', 'Frontend\FrontendCtrl@singleCategory');

//rest route
    
Route::get('rest/getAllArticle', 'Frontend\Rest\ArticleCtrl@getAllArticle');
