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
