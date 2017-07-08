<?php


//Danh sách router của frontend 

Route::get('/', 'Frontend\FrontendCtrl@homePage');
Route::get('/tin-bai', 'Frontend\FrontendCtrl@singlePage');
Route::get('/chuyen-muc', 'Frontend\FrontendCtrl@singleCategory');