<?php
class AuthController extends BaseController
{
	

    public function getLogin ()
    {
    	
        return View::make("login");
    	// return Redirect::action('GamesController@index');
    }


    public function createLogin()
    {
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) 
        {
                        return Redirect::to('/')->with('message', 'You are now logged in!');
        } else {
                        return Redirect::to('/login')
                                ->with('message', 'Your username/password combination was incorrect')
                                ->withInput();
        }
    }

    /*


    */

    public function getRegister()
    {

        return View::make('register');

    }


    public function createRegister()
    {


        $user = new User ; 
        $user->firstname= Input::get('firstname');
        $user->lastname= Input::get('lastname');
        $user->email= Input::get('email');
        $user->password =  Hash::make(Input::get('password'));
        $user->save();
        
    }

    public function getLogout() 
    {
        Auth::logout();
        return Redirect::to('/login')->with('message', 'Your are now logged out!');
    
    }



}



?>
