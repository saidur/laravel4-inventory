<?php
//use MrJuliuss\Syntara\Controllers\BaseController;
//use MrJuliss\Syntara\Controllers\BaseController;

//use MrJuliuss\Syntara\Controllers\BaseController;
//use MrJuliuss\Syntara\Controllers\PermissionProvider;

use MrJuliuss\Syntara\Controllers\BaseController;

class GamesController extends BaseController
{

	function __construct ()
	{
		$this->beforeFilter('auth', array('except' => 'index'));
	}

	public function index()
	{
		
		$this->layout = View::make('index-view');
        $this->layout->title = 'My new feature';

        // add breadcrumb to current page
        $this->layout->breadcrumb = array(
            array(
                'title' => 'My new feature',
                'link' => 'dashboard',
                'icon' => 'glyphicon-home'
            ),
            array(
                'title' => 'Current Page',
                'link' => 'dashboard/current',
                'icon' => 'glyphicon-plus'
            ),
        );

        $permission =  PermissionProvider::findById(1);
        
        //echo "<pre>";
        //print_r ($permission);
        //var_dump ($permission);

		//echo Hash::make('admin123');
		
		//$permission = PermissionProvider::findAll();
		//var_dump ($permission);


		//$games = Game::all();
		//return View::make('index',compact('games'));
	
        $this->layout = View::make(Config::get('syntara::views.dashboard-index'));
        $this->layout->title = trans('syntara::all.titles.index');
        $this->layout->breadcrumb = Config::get('syntara::breadcrumbs.dashboard');

	}


	public function create()
	{
		
		return View::make('create');
	}


	public function handleCreate()
	{
		//return View::make('');

		$game = new Game;
    	$game->title = Input::get('title');
    	$game->publisher = Input::get('publisher');
    	$game->complete = Input::has('complete');
    	$game->save();

    	 return Redirect::action('GamesController@index');

	}

	public function edit (Game $game)
	{
		

		return View::make('edit',compact('game'));

	}

	public function handleEdit ()
	{
		$game = Game::findOrFail(Input::get('id'));
    $game->title        = Input::get('title');
    $game->publisher    = Input::get('publisher');
    $game->complete     = Input::has('complete');
    $game->save();

    return Redirect::action('GamesController@index');

	}

	public function delete(Game $game)
	{
		return View::make('delete',compact('game'));

	}

	public function handleDelete ()
	{
		$id = Input::get('game');
    	$game = Game::findOrFail($id);
    	$game->delete();

    	return Redirect::action('GamesController@index');
	}

	

}

?>

