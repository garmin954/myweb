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

Route::redirect('/', 'admin');
Route::prefix('admin')->name('admin.')->group( function (){
    Route::get('/', 'Admin\AdminController@index')->name('home');
    Route::get('/home', 'Admin\AdminController@home')->name('home');

    Route::prefix('config')->name('config.')->group(function (){
        Route::get('index', 'Admin\ConfigController@index')->name('index');
        Route::any('create', 'Admin\ConfigController@create')->name('create');
        Route::post('info', 'Admin\ConfigController@info')->name('info');
        Route::post('changeField', 'Admin\ConfigController@changeField')->name('changeField');
        Route::any('config', 'Admin\ConfigController@config')->name('config');

    });

    Route::prefix('config_type')->name('config_type.')->group(function (){
        Route::get('index', 'Admin\ConfigTypeController@index')->name('index');
        Route::any('create', 'Admin\ConfigTypeController@create')->name('create');
        Route::any('info', 'Admin\ConfigTypeController@info')->name('info');
        Route::post('getConfigTypeList', 'Admin\ConfigTypeController@getConfigTypeList')->name('getConfigTypeList');

    });

    //商品
    Route::prefix('goods')->name('goods.')->group(function (){
        Route::get('index', 'Admin\GoodsController@index')->name('index');
        Route::any('create', 'Admin\GoodsController@create')->name('create');
        Route::any('info', 'Admin\GoodsController@info')->name('info');
        Route::any('changeField', 'Admin\GoodsController@changeField')->name('changeField');
        Route::post('getConfigTypeList', 'Admin\GoodsController@getConfigTypeList')->name('getConfigTypeList');
    });
    // 商品分类
    Route::prefix('goods_category')->name('goods_category.')->group(function (){
        Route::get('index', 'Admin\GoodsCategoryController@index')->name('index');
        Route::any('create', 'Admin\GoodsCategoryController@create')->name('create');
        Route::any('info', 'Admin\GoodsCategoryController@info')->name('info');
        Route::any('changeField', 'Admin\GoodsCategoryController@changeField')->name('changeField');
        Route::post('getConfigTypeList', 'Admin\GoodsCategoryController@getConfigTypeList')->name('getConfigTypeList');
    });

    //相册
    Route::prefix('picture')->name('picture.')->group(function (){
        Route::get('index', 'Admin\PictureController@index')->name('index');
        Route::post('update', 'Admin\PictureController@update')->name('update');
        Route::post('delete', 'Admin\PictureController@delete')->name('delete');
    });
});
