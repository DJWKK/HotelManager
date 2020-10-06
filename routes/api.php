<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin/oAuth')->namespace('Admin\OAuth')->group(function () {
    Route::post('login', 'AuthController@login'); //登陆
    Route::post('logout', 'AuthController@logout'); //退出登陆
    Route::post('refresh', 'AuthController@refresh'); //刷新token
     Route::post('registered', 'AuthController@registered'); //注册用户
    // Route::get('info', 'AuthController@info'); //注册用户
});


//index data 主页数据
Route::prefix('index')->namespace('Func')->group(function () {
    //index function
    Route::get('titledata','IndexController@getTitleData');
    Route::get('custlist','IndexController@getCustList');
    Route::get('roominfo','IndexController@getRoomInfo');
    Route::get('checkout','IndexController@checkOut');
});

// cust check in 顾客入住
Route::post('checkin','Func\CheckInController@checkIn');

// room manager 房间管理
Route::prefix('roommanager')->namespace('Func')->group(function () {
    Route::get('list','RomeManageController@getList');
    Route::get('info','RomeManageController@getInfo');
    Route::post('setinfo','RomeManageController@setInfo');
});

// room class manager 房间类别管理
Route::prefix('roomclass')->namespace('Func')->group(function () {
    Route::get('classinfo','RomeClassController@getInfo');
    Route::post('setclassinfo','RomeClassController@setInfo');
});

//customer manager 顾客信息管理
Route::prefix('custmanager')->namespace('Func')->group(function () {
    Route::get('list','CustmanageController@getList');
    Route::get('info','CustmanageController@getInfo');
    Route::get('del','CustmanageController@delInfo');
    Route::post('set','CustmanageController@setInfo');
    Route::get('search','CustmanageController@search');
});

//record manager 入住记录管理
Route::prefix('record')->namespace('Func')->group(function () {
    Route::get('list','CheckInListController@getList');
    Route::get('del','CheckInListController@delInfo');
    Route::get('search','CheckInListController@search');
});

//log 日志记录
Route::get('log','Func\LogController@getLog');

//客户预约
Route::post('resver','ResverController@resver');
