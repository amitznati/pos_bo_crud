<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('locale/{locale?}',
    [
        'as' => 'locale.setlocale',
        'uses' => 'LocaleController@setLocale'
    ]);

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['admin'],
    'namespace' => 'Admin'
], function() {
    // your CRUD resources and other admin routes here
    CRUD::resource('product', 'ProductCrudController');
    CRUD::resource('department', 'DepartmentCrudController');
    CRUD::resource('group', 'GroupCrudController');
    CRUD::resource('customer', 'CustomerCrudController');
    CRUD::resource('contact', 'ContactCrudController');
});