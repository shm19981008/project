<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    echo 111;
    return view('welcome');
});
Route::any('/admin','Admin\AdminController@admin');
Route::any('/banneradd','Admin\AdminController@banneradd');
Route::any('/do_add','Admin\AdminController@do_add');
Route::any('/bannerlist','Admin\AdminController@bannerlist');
Route::any('/del','Admin\AdminController@bannerdel');
Route::any('/update/{id}','Admin\AdminController@update');
Route::any('/upd','Admin\AdminController@upd');
Route::any('/do_update','Admin\AdminController@do_update');
Route::any('/cate/add','Admin\CateController@cateAdd');
Route::any('/cate/do_add','Admin\CateController@do_add');
Route::any('/cate/list','Admin\CateController@lists');
Route::any('/cate/del','Admin\CateController@del');
Route::any('/cate/update/{id}','Admin\CateController@update');
Route::any('/cate/do_update','Admin\CateController@do_update');