# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

# How to use (使用说明)

##please **composer install** firstly, after you clone these codes in your PC. (安装扩展包)

~~~
composer install
~~~

## Create tables and db:seeder (自动创建数据表，植入数据)

~~~
php artisan migrate
php artisan db:seeder
~~~

## The following is an Adminer account for super manager.(下面是后台超级管理员登陆)

url: http://localhost/jackadmin <br>
account: admin@admin.com <br>
password: 12345678

## Routes in the group of middleware permession mast have route name.(在权限中间件的路由必须有命名)
~~~php
        Route::group(['middleware' => 'permession'], function(){
            //manager
            Route::get('/manager','ManagerController@index')->name('manager');
            Route::post('/manager/store','ManagerController@store')->name('manager.store');
            Route::post('/manager/update/{id}','ManagerController@update')->name('manager.update');
            Route::get('/manager/delete/{id}','ManagerController@delete')->name('manager.delete');
            Route::post('/manager/branch/{id}/store','ManagerController@branchStore')->name('manager.branch');
            //role
            Route::get('/role','RoleController@index')->name('role');
            Route::post('/role/store','RoleController@store')->name('role.store');
            Route::post('/role/update/{id}','RoleController@update')->name('role.update');
            Route::get('/role/delete/{id}','RoleController@delete')->name('role.delete');
            Route::post('/role/distribute/store/{id}','RoleController@distributeStore')->name('role.distribute');
        });    
~~~

## add permessions into table permessions, you can login /jackadmin/permession to add permessions. like the below photo (登陆此URL手动将权限添加进数据库，如下图)

![](https://github.com/xuanjiang1985/laravel-5-2/raw/master/public/images/permession.png)