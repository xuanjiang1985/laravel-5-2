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
    Route::get('/home1', 'HomeController@home1')->name('home.index');
    Route::get('/home2', 'HomeController@home2');
    Route::get('/cps/test','TestController@test');
    Route::get('/cps/name','TestController@name');
    Route::get('/cps/a','TestController@a');
    Route::get('/cps/b','TestController@b');
    Route::get('/cps/c','TestController@c');
    Route::get('/jackcare', 'HomeController@jackcare');
    //Auth 前台-登录成功
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/home2', 'HomeController@home2');
    });
    //后台
    Route::get('/jackadmin/login','Admin\AdminController@getLogin');
    Route::post('/jackadmin/login','Admin\AdminController@postLogin');
    //后台auth-admin
    Route::group(['middleware' => 'admin','prefix' => 'jackadmin','namespace' => 'Admin'], function () {
        Route::get('/','AdminController@index')->name('admin');
        Route::get('/logout','AdminController@getLogout');
        //管理员改自己的密码
        Route::get('/password','ManagerController@passwordChange');
        Route::post('/password/update','ManagerController@passwordUpdate');
        //add permession
        Route::get('/permession','AdminController@permessionIndex')->name('permession');
        Route::get('/permession/create','AdminController@permessionCreate');
        Route::post('/permession/create','AdminController@permessionStore');
        Route::get('/permession/sort/{id}','AdminController@permessionSort');
        Route::get('/permession/item/{id}','AdminController@permessionItem');
        Route::get('/permession/show/{id}','AdminController@permessionShow');
        Route::post('/permession/show/{id}','AdminController@permessionUpdate');
        Route::get('/permession/delete/{id}','AdminController@permessionDestroy');
        //管理员管理
        Route::get('/manager/create','ManagerController@create');
        Route::get('/manager/show/{id}','ManagerController@show');
        Route::get('/manager/branch/{id}','ManagerController@branch');
        //权限组
        Route::get('/role/create','RoleController@create');
        Route::get('/role/show/{id}','RoleController@show');
        Route::get('/role/distribute/{id}','RoleController@distribute');
        //后台 need permessions with router name.
        Route::group(['middleware' => 'permession'], function(){
            //管理员管理
            Route::get('/manager','ManagerController@index')->name('manager');
            Route::post('/manager/store','ManagerController@store')->name('manager.store');
            Route::post('/manager/update/{id}','ManagerController@update')->name('manager.update');
            Route::get('/manager/delete/{id}','ManagerController@delete')->name('manager.delete');
            Route::post('/manager/branch/{id}/store','ManagerController@branchStore')->name('manager.branch');
            //权限组
            Route::get('/role','RoleController@index')->name('role');
            Route::post('/role/store','RoleController@store')->name('role.store');
            Route::post('/role/update/{id}','RoleController@update')->name('role.update');
            Route::get('/role/delete/{id}','RoleController@delete')->name('role.delete');
            Route::post('/role/distribute/store/{id}','RoleController@distributeStore')->name('role.distribute');
        });
    });
});

