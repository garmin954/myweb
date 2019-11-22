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
        Route::get('getSearchData', 'Admin\GoodsController@getSearchData')->name('getSearchData');
        Route::any('changeField', 'Admin\GoodsController@changeField')->name('changeField');
        Route::any('getGoodsRelated', 'Admin\GoodsController@getGoodsRelated')->name('getGoodsRelated');
        Route::post('getConfigTypeList', 'Admin\GoodsController@getConfigTypeList')->name('getConfigTypeList');
    });
    // 商品分类
    Route::prefix('goods_category')->name('goods_category.')->group(function (){
        Route::get('index', 'Admin\GoodsCategoryController@index')->name('index');
        Route::any('create', 'Admin\GoodsCategoryController@create')->name('create');
        Route::any('info', 'Admin\GoodsCategoryController@info')->name('info');
        Route::any('getGoodsCategoryTree', 'Admin\GoodsCategoryController@getGoodsCategoryTree')->name('getGoodsCategoryTree');
        Route::any('delData', 'Admin\GoodsCategoryController@delData')->name('delData');
        Route::any('changeField', 'Admin\GoodsCategoryController@changeField')->name('changeField');
        Route::post('getConfigTypeList', 'Admin\GoodsCategoryController@getConfigTypeList')->name('getConfigTypeList');
    });

    //相册
    Route::prefix('picture')->name('picture.')->group(function (){
        Route::get('index', 'Admin\PictureController@index')->name('index');
        Route::post('update', 'Admin\PictureController@update')->name('update');
        Route::post('delete', 'Admin\PictureController@delete')->name('delete');
    });

    //广告
    Route::prefix('advertise')->name('advertise.')->group(function (){
        Route::any('create', 'Admin\AdvertiseController@create')->name('create');
        Route::get('index', 'Admin\AdvertiseController@index')->name('index');
        Route::post('update', 'Admin\AdvertiseController@update')->name('update');
        Route::post('delete', 'Admin\AdvertiseController@delete')->name('delete');
        Route::any('changeField', 'Admin\AdvertiseController@changeField')->name('changeField');

    });

    // 内容
    Route::prefix('article1')->name('article1.')->group(function (){
        Route::any('create', 'Admin\ArticleController@create')->name('create');
        Route::get('index', 'Admin\ArticleController@index')->name('index');
        Route::post('update', 'Admin\ArticleController@update')->name('update');
        Route::post('delete', 'Admin\ArticleController@delete')->name('delete');
        Route::any('changeField', 'Admin\ArticleController@changeField')->name('changeField');

    });
    // 内容
    Route::prefix('article')->name('article.')->group(function (){
        Route::any('create', 'Admin\ArticleController@create')->name('create');
        Route::get('index', 'Admin\ArticleController@index')->name('index');
        Route::post('update', 'Admin\ArticleController@update')->name('update');
        Route::post('delete', 'Admin\ArticleController@delete')->name('delete');
        Route::any('changeField', 'Admin\ArticleController@changeField')->name('changeField');

    });
    // 内容
    Route::prefix('article2')->name('article2.')->group(function (){
        Route::any('create', 'Admin\ArticleController@create')->name('create');
        Route::get('index', 'Admin\ArticleController@index')->name('index');
        Route::post('update', 'Admin\ArticleController@update')->name('update');
        Route::post('delete', 'Admin\ArticleController@delete')->name('delete');
        Route::any('changeField', 'Admin\ArticleController@changeField')->name('changeField');

    });

    // 上传
    Route::any('upload', 'BaseController@upload')->name('upload');

});


/************* 前台路由 *************/
Route::get('goods', 'Home\GoodsController@index')->name('goods');
Route::get('/', 'Home\IndexController@index')->name('/');
