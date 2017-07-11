<?php

//route for backend after login
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    #quang cao
    Route::get('/advertising', 'Backend\Advertising\AdvertisingCtrl@main')->name('advertising');
    Route::get('/advertising/single', 'Backend\Advertising\AdvertisingCtrl@single')->name('singleAadvertising');
});

