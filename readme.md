# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
<code>
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

</code>