<?php


//route for login
Route::group(['prefix' => 'admin', 'middleware' => ['web']], function () {
   Route::get('/', 'Backend\User\UserCtrl@index')->name('defaultPageAfterLogin')->middleware(['web', 'auth']);
    Route::get('/login', 'Backend\User\LoginCtrl@showLoginForm')->name('login')->middleware('guest');
    Route::post('/login', 'Backend\User\LoginCtrl@login')->name('doLogin')->middleware('guest');
    Route::get('/logout', 'Backend\User\LoginCtrl@logout')->name('doLogout');
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
    Route::delete('/adv/{id}', 'Backend\Rest\AdvCtrl@deleteAdv');
    
    //setting
    Route::get('/setting', 'Backend\Rest\SettingCtrl@listSetting');
    Route::put('/setting', 'Backend\Rest\SettingCtrl@updateSetting');
    Route::get('/setting/:key', 'Backend\Rest\SettingCtrl@infoSetting')->where('key', '[\w]+');
    
    //menu
    Route::post('/menu/position', 'Backend\Rest\MenuCtrl@insertMenuPosition');
    Route::put('/menu/position', 'Backend\Rest\MenuCtrl@updateMenuPosition');
    Route::delete('/menu/position/{id}', 'Backend\Rest\MenuCtrl@deleteMenuPosition')->where('id', '[\d]+');
    Route::get('/menu/position', 'Backend\Rest\MenuCtrl@listMenuPosition');
    
    Route::post('/menu', 'Backend\Rest\MenuCtrl@insertMenu');
    Route::put('/menu', 'Backend\Rest\MenuCtrl@updateMenu');
    Route::delete('/menu/{id}', 'Backend\Rest\MenuCtrl@deleteMenu')->where('id', '[\d]+');
    Route::get('/menu/{positionId}', 'Backend\Rest\MenuCtrl@listMenu')->where('id', '[\d]+');
    Route::get('/menu/info/{id}', 'Backend\Rest\MenuCtrl@infoMenu')->where('id', '[\d]+');
    Route::put('/menu/order', 'Backend\Rest\MenuCtrl@reOrderMenu');
    Route::get('/menu/type', 'Backend\Rest\MenuCtrl@listMenuType');
    
    //widget
    Route::get('/widget/type', 'Backend\Rest\WidgetCtrl@listWidgetType');
    Route::get('/widget/position', 'Backend\Rest\WidgetCtrl@listWidgetPosition');
    
    Route::post('/widget/item', 'Backend\Rest\WidgetCtrl@insertWidgetItem');
    Route::put('/widget/item/{id}', 'Backend\Rest\WidgetCtrl@updateWidgetItem')->where('id', '[\d]+');
    Route::delete('/widget/item/{id}', 'Backend\Rest\WidgetCtrl@deleteWidgetItem')->where('id', '[\d]+');
    Route::put('/widget/item/order', 'Backend\Rest\WidgetCtrl@reOrderWidgetItem')->where('id', '[\d]+');
    
    Route::put('/widget/cache', 'Backend\Rest\WidgetCtrl@cacheWidget');
    
    //feedback
    Route::post('/feedback', 'Backend\Rest\FeedbackCtrl@insertFeedback');
    Route::get('/feedback/{id}', 'Backend\Rest\FeedbackCtrl@infoFeedback')->where('id', '[\d]+');
    Route::get('/feedback', 'Backend\Rest\FeedbackCtrl@listFeedback');
    Route::put('/feedback/{id}', 'Backend\Rest\FeedbackCtrl@updateFeedback')->where('id', '[\d]+');
    Route::delete('/feedback/{id}', 'Backend\Rest\FeedbackCtrl@deleteFeedback')->where('id', '[\d]+');
    
    //address
    Route::post('/address_city', 'Backend\Rest\AddressCtrl@insertCity');
    Route::get('/address_city', 'Backend\Rest\AddressCtrl@listCity');
    Route::get('/address_city/{id}', 'Backend\Rest\AddressCtrl@infoCity')->where('id', '[\d]+');
    Route::put('/address_city/{id}', 'Backend\Rest\AddressCtrl@updateCity')->where('id', '[\d]+');
    Route::delete('/address_city/{id}', 'Backend\Rest\AddressCtrl@deleteCity')->where('id', '[\d]+');
    
    Route::post('/address_district', 'Backend\Rest\AddressCtrl@insertDistrict');
    Route::get('/address_district', 'Backend\Rest\AddressCtrl@listDistrict');
    Route::get('/address_district/{id}', 'Backend\Rest\AddressCtrl@infoDistrict')->where('id', '[\d]+');
    Route::put('/address_district/{id}', 'Backend\Rest\AddressCtrl@updateDistrict')->where('id', '[\d]+');
    Route::delete('/address_district/{id}', 'Backend\Rest\AddressCtrl@deleteDistrict')->where('id', '[\d]+');
    
    Route::post('/address_village', 'Backend\Rest\AddressCtrl@insertVillage');
    Route::get('/address_village', 'Backend\Rest\AddressCtrl@listVillage');
    Route::get('/address_village/{id}', 'Backend\Rest\AddressCtrl@infoVillage')->where('id', '[\d]+');
    Route::put('/address_village/{id}', 'Backend\Rest\AddressCtrl@updateVillage')->where('id', '[\d]+');
    Route::delete('/address_village/{id}', 'Backend\Rest\AddressCtrl@deleteVillage')->where('id', '[\d]+');
    
    Route::post('/address_street', 'Backend\Rest\AddressCtrl@insertStreet');
    Route::get('/address_street', 'Backend\Rest\AddressCtrl@listStreet');
    Route::get('/address_street/{id}', 'Backend\Rest\AddressCtrl@infoStreet')->where('id', '[\d]+');
    Route::put('/address_street/{id}', 'Backend\Rest\AddressCtrl@updateStreet')->where('id', '[\d]+');
    Route::delete('/address_street/{id}', 'Backend\Rest\AddressCtrl@deleteStreet')->where('id', '[\d]+');
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
    
    //widget 
    Route::get('/widget/type/{type}', 'Backend\Widget\WidgetCtrl@widgetItem')->where('type', '[\w]+');
});

//route test
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{ 
    Route::get('/test/{view}', 'TestCtrl@index');
});

require 'huong.web.php';
require 'minh.web.php';