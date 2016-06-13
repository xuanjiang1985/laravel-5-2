<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/info', function () {
    return phpinfo();
    });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => 'web'], function () {

    Route::get('/', function () {
    return view('index');
    });
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/home1', 'HomeController@home1');
    Route::get('/home2', 'HomeController@home2');
    Route::get('/cps/test','TestController@test');
    Route::get('/cps/name','TestController@name');
    Route::get('/cps/a','TestController@a');
    Route::get('/cps/b','TestController@b');
    Route::get('/cps/c','TestController@c');
    Route::get('/jackcare', 'HomeController@jackcare');
    //Auth 认证
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/home2', 'HomeController@home2');
    });
    //后台
    Route::get('/jackadmin/login','Admin\AdminController@getLogin');
    Route::post('/jackadmin/login','Admin\AdminController@postLogin');

    Route::group(['middleware' => 'admin','prefix' => 'jackadmin'], function () {
        Route::get('/','Admin\AdminController@index')->name('admin');
        Route::get('/logout','Admin\AdminController@getLogout');
    });
});

