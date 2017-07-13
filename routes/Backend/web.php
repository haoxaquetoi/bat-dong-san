<?php


//route for login
Route::group(['prefix' => 'admin', 'middleware' => ['web']], function () {
   Route::get('/', 'Backend\User\UserCtrl@index')->name('defaultPageAfterLogin')->middleware(['web', 'auth']);
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
    Route::put('/user/permit/{id}', 'Backend\Rest\UserCtrl@updatePermit')->where('id', '[\d]+');
    Route::put('/user/group/{id}', 'Backend\Rest\UserCtrl@updateGroup')->where('id', '[\d]+');
    
    
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
    
    //adv
    Route::get('/adv', 'Backend\Rest\AdvCtrl@listAdv');
    Route::get('/adv/{id}', 'Backend\Rest\AdvCtrl@infoAdv')->where('id', '[\d]+');
    Route::post('/adv', 'Backend\Rest\AdvCtrl@insertAdv');
    Route::put('/adv', 'Backend\Rest\AdvCtrl@updateAdv');
    Route::delete('/adv', 'Backend\Rest\AdvCtrl@deleteAdv');
    
    //setting
    Route::get('/setting', 'Backend\Rest\SettingCtrl@listSetting');
    Route::put('/setting', 'Backend\Rest\SettingCtrl@updateSetting');
    Route::get('/setting/:key', 'Backend\Rest\SettingCtrl@infoSetting')->where('key', '[\W]+');
    
    //menu
    Route::post('/menu/position', 'Backend\Rest\MenuCtrl@insertMenuPosition');
    Route::put('/menu/position', 'Backend\Rest\MenuCtrl@updateMenuPosition');
    Route::delete('/menu/position/{id}', 'Backend\Rest\MenuCtrl@deleteMenuPosition')->where('id', '[\d]+');
    Route::get('/menu/position', 'Backend\Rest\MenuCtrl@listMenuPosition');
    
    Route::post('/menu', 'Backend\Rest\MenuCtrl@insertMenu');
    Route::put('/menu', 'Backend\Rest\MenuCtrl@updateMenu');
    Route::delete('/menu/{id}', 'Backend\Rest\MenuCtrl@deleteMenu')->where('id', '[\d]+');
    Route::get('/menu/{positionId}', 'Backend\Rest\MenuCtrl@listMenu')->where('id', '[\d]+');
    Route::get('/menu/{id}', 'Backend\Rest\MenuCtrl@infoMenu')->where('id', '[\d]+');
    Route::put('/menu/order', 'Backend\Rest\MenuCtrl@reOrderMenu');
    
    //widget
    Route::get('/widget/type', 'Backend\Rest\WidgetCtrl@listWidgetType');
    Route::get('/widget/position', 'Backend\Rest\WidgetCtrl@listWidgetPosition');
    
    Route::post('/widget/item', 'Backend\Rest\WidgetCtrl@insertWidgetItem');
    Route::put('/widget/item/{id}', 'Backend\Rest\WidgetCtrl@updateWidgetItem')->where('id', '[\d]+');
    Route::delete('/widget/item/{id}', 'Backend\Rest\WidgetCtrl@deleteWidgetItem')->where('id', '[\d]+');
    Route::put('/widget/item/order', 'Backend\Rest\WidgetCtrl@reOrderWidgetItem')->where('id', '[\d]+');
    
    Route::put('/widget/item/cache', 'Backend\Rest\WidgetCtrl@cacheWidget');
});


//route for backend after login
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
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
require 'minh.web.php';