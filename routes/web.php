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
        Route::get('info', 'Admin\ConfigController@info')->name('info');

    });

    Route::prefix('config_type')->name('config_type.')->group(function (){
        Route::get('index', 'Admin\ConfigTypeController@index')->name('index');
        Route::any('create', 'Admin\ConfigTypeController@create')->name('create');
    });
});
