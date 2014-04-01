<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('/dashboard');
});

Route::model('game','Game');

Route::group(array('before' => 'basicAuth|hasPermissions', 'prefix' => Config::get('syntara::config.uri')), function()
{
	
	Route::get('/branch', array('as' => 'listBranch','before' => 'hasPermissions:list.branches', 'uses' => 'BranchesController@index'));
	Route::get('/branch/new', array('as' => 'createBranch','before' => 'hasPermissions:create.branch', 'uses' => 'BranchesController@create'));
	Route::post('/branch/new', array('as' => 'createBranch','before' => 'hasPermissions:create.branch', 'uses' => 'BranchesController@store'));

	Route::get('/category', array('as' => 'listCategory','before' => 'hasPermissions:list.category', 'uses' => 'CategoriesController@index'));
	Route::get('/category/create', array('as' => 'categories.create','before' => 'hasPermissions:create.category', 'uses' => 'CategoriesController@create'));
	Route::get('/category/store', array('as' => 'categories.store','before' => 'hasPermissions:store.category', 'uses' => 'CategoriesController@store'));


	Route::get('/product', array('as' => 'product.index','before' => 'hasPermissions:list.products', 'uses' => 'ProductController@index'));
	
	Route::get('/product/create', array('as' => 'product.create','before' => 'hasPermissions:create.product', 'uses' => 'ProductController@create'));
	Route::post('product/store', array('as' => 'product.store','before' => 'hasPermissions:create.product', 'uses' => 'ProductController@store'));
	Route::post('/product/grid', array('as' => 'gridProduct','before' => 'hasPermissions:list.products', 'uses' => 'ProductController@grid'));

	Route::get('/order', array('as' => 'order.index','before' => 'hasPermissions:list.orders', 'uses' => 'OrderController@index'));
	Route::get('/order/create', array('as' => 'order.create','before' => 'hasPermissions:list.orders', 'uses' => 'OrderController@create'));
	Route::post('/order/store', array('as' => 'order.store','before' => 'hasPermissions:list.orders', 'uses' => 'OrderController@store'));
	Route::get('/order/show/{id}', array('as' => 'order.show','before' => 'hasPermissions:list.orders', 'uses' => 'OrderController@show'));
	Route::get('/order/approve/{id}', array('as' => 'order.show','before' => 'hasPermissions:list.orders', 'uses' => 'OrderController@approve'));
	Route::post('/order/approve_order', array('as' => 'order.approve_order','before' => 'hasPermissions:list.orders', 'uses' => 'OrderController@approve_order'));

	Route::post('/order/getProduct', array('as' => 'order.getProduct','before' => 'hasPermissions:list.orders', 'uses' => 'OrderController@getProduct'));
});

Route::resource('dashboard/warehouses', 'WarehousesController');
Config::set('syntara::views.dashboard-index', 'index-view');
Route::resource('companies', 'CompaniesController');
Route::resource('profiles', 'ProfilesController');
