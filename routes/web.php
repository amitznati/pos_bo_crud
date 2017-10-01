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
    CRUD::resource('vendor', 'VendorCrudController');
    CRUD::resource('employee', 'EmployeeCrudController');
    CRUD::resource('customer', 'CustomerCrudController');
    CRUD::resource('contact', 'ContactCrudController');
    CRUD::resource('salerytype', 'SaleryTypeCrudController');
	Route::get('menu_design',['as' => 'admin.menu_design', 'uses' => 'MenuDesignController@index']);
	Route::post('menu_design/saveMenu',['as' => 'admin.menu_design.saveMenu', 'uses' => 'MenuDesignController@saveMenu']);
    CRUD::resource('menu', 'MenuCrudController');
    CRUD::resource('store', 'StoreCrudController');
    CRUD::resource('pos', 'PosCrudController');
});

Route::group([
    'prefix' => 'pos',
    'middleware' => 'App\Http\Middleware\pos\POSMiddleware',
    'namespace' => 'POS'
], function() {
    Route::get('home',['as' => 'pos.index', 'uses' => 'POSController@index']);
    Route::get('terminal',['as' => 'pos.terminal', 'uses' => 'POSController@terminal']);
    Route::get('dialog/{dialog?}',['as' => 'pos.dialog', 'uses' => 'POSController@dialog']);
    Route::get('terminalWithEmployee/{empnum?}',['as' => 'pos.terminalWithEmployee', 'uses' => 'POSController@terminalWithEmployee']);
    Route::get('type_attendance',['as' => 'pos.type_attendance', 'uses' => 'POSController@typeAttendance']);
});