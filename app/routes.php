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
	

	return View::make('hello');
});


Route::model('game','Game');


Route::group(array('before' => 'basicAuth|hasPermissions', 'prefix' => Config::get('syntara::config.uri')), function()
{
	
	Route::get('games', array('as' => 'listGames', 'before' => 'hasPermissions:create.article','uses' => 'GamesController@index'));
	//Route::resource('branches', 'BranchesController');
	Route::get('/branch', array('as' => 'listBranch','before' => 'hasPermissions:list.branches', 'uses' => 'BranchesController@index'));
	Route::get('/branch/new', array('as' => 'createBranch','before' => 'hasPermissions:create.branch', 'uses' => 'BranchesController@create'));
	Route::post('/branch/new', array('as' => 'createBranch','before' => 'hasPermissions:create.branch', 'uses' => 'BranchesController@store'));

	Route::get('/category', array('as' => 'listCategory','before' => 'hasPermissions:list.category', 'uses' => 'CategoriesController@index'));
	Route::get('/category/create', array('as' => 'categories.create','before' => 'hasPermissions:create.category', 'uses' => 'CategoriesController@create'));
	Route::get('/category/store', array('as' => 'categories.store','before' => 'hasPermissions:store.category', 'uses' => 'CategoriesController@store'));


	Route::get('/product', array('as' => 'listProduct','before' => 'hasPermissions:list.products', 'uses' => 'ProductController@index'));
	
	Route::get('/product/create', array('as' => 'product.create','before' => 'hasPermissions:create.product', 'uses' => 'ProductController@create'));
	Route::post('product/store', array('as' => 'product.store','before' => 'hasPermissions:create.product', 'uses' => 'ProductController@store'));


});	



//show pages

//Route::get('/gm','GamesController@index');
//Route::get('gm', array('as' => 'listGames', 'uses' => 'GamesController@index'));

//Route::get('games', array('as' => 'listGames', 'before' => 'hasPermissions:create.article','uses' => 'GamesController@index'));






//Route::get('/create','GamesController@create');
//Route::get('/edit/{game}','GamesController@edit');
//Route::get('/delete/{game}','GamesController@delete');

//handle form submission

/*Route::post('/create','GamesController@handleCreate');
Route::post('/edit','GamesController@handleEdit');
Route::post('/delete', 'GamesController@handleDelete');

Route::get('/login','AuthController@getLogin');
Route::get('/logout','AuthController@getLogout');
Route::post('/login','AuthController@createLogin');
Route::get('/register','AuthController@getRegister');
Route::post('/register','AuthController@createRegister');
*/
//Route::get('/admin', 'MrJuliss\Syntara\Controllers\GamesController@index');
//Route::get('games', array('as' => 'listGames', 'uses' => 'MrJuliuss\Syntara\Controllers\GamesController@index'));


Config::set('syntara::views.dashboard-index', 'index-view');




Route::resource('companies', 'CompaniesController');