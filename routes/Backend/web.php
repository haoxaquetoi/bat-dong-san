<?php

//route for login
Route::group(['prefix' => 'backend', 'middleware' => ['web']], function () {
   
    Route::get('/login', 'Backend\User\loginCtrl@showLoginForm')->name('login')->middleware('guest');
    Route::post('/login', 'Backend\User\loginCtrl@login')->name('doLogin')->middleware('guest');
    Route::get('/logout', 'Backend\User\loginCtrl@logout')->name('doLogout');
});


//rest route
Route::group(['prefix' => 'rest', 'middleware' => ['web', 'auth']], function () {
    //user
    Route::get('/user/{id}', 'Backend\Rest\UserCtrl@userInfo')->where('id', '[\d]+');
    Route::get('/user/curUser', 'Backend\Rest\UserCtrl@curUserInfo');
    Route::put('/user/edit', 'Backend\rest\UserCtrl@editUser')->name('editUser');
    
    Route::get('/user/paginate', 'Backend\Rest\UserCtrl@paginateUser');
    
    //ou
    Route::get('/ou/getAllOu', 'Backend\Rest\OuCtrl@getAllOu');
    Route::post('/ou/addNewOu', 'Backend\Rest\OuCtrl@insert');
    Route::put('/ou/editOu', 'Backend\Rest\OuCtrl@editOu');
    
    //group
    Route::post('/group', 'Backend\Rest\GroupCtrl@insertGroup');
    Route::put('/group', 'Backend\Rest\GroupCtrl@updateGroup');
    Route::get('/group', 'Backend\Rest\GroupCtrl@listGroup');
    Route::get('/group/{id}', 'Backend\Rest\GroupCtrl@infoGroup')->where('id', '[\d]+');
    Route::delete('/group/{id}', 'Backend\Rest\GroupCtrl@deleteGroup')->where('id', '[\d]+');
    
    //groupUser
    Route::get('/groupUser/{groupID}', 'Backend\Rest\GroupUserCtrl@listUser');
    
    //permit
    Route::get('/permit', 'Backend\Rest\PermitCtrl@listPermit');
    Route::get('/permit/group/{id}', 'Backend\Rest\PermitCtrl@listPermitOfGroup')->where('id', '[\d]+');
});


//route for backend after login
Route::group(['prefix' => 'backend', 'middleware' => ['web', 'auth']], function ()
{
    //user
    Route::get('/user', 'Backend\User\UserCtrl@index')->name('user');
    
    //group
    Route::get('/group', 'Backend\User\GroupCtrl@index')->name('group');
    Route::get('/group/list', 'Backend\User\GroupCtrl@all')->name('listGroup');
    Route::get('/group/single', 'Backend\User\GroupCtrl@single')->name('singleGroup');
    
    //modal
    Route::get('/modal/{name}', 'Backend\Modal\ModalCtrl@index')->name('getModal');
});


require 'huong.web.php';