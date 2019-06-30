<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{

    public function getRegister()
    {
    	return view('index');
    }

    protected function postRegister(Request $request)
    {
		//validation
		$request->validate(
			[
			'username' => 'required|unique:users|min:5',
			'password' => 'required|min:6',
			'email' => 'required|unique:users|email|max:255',
			]
		); 

		//auth new users
		$new_user= User::create(
			[
				'email' => $request->input('email'),
				'username' => $request->input('username'),
				'password' => bcrypt ($request->input('password')),
			]
		);

		//The new user is being login after validation
		Auth::login($new_user);
		//redicting the user to the profile view
		return redirect()->intended('profile');

    }

    public function getLogin()
    {
    	return view('index');
    }

    protected function postLogin(Request $request)
    {
        // set the remember me cookie if the user check the box
        $remember = ($request->has('remember')) ? true : false;

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials,$remember)) 
        {
            // Authentication passed...
            return redirect()->intended('filter');
        }
        else
        {
        	return redirect()->back();
        }    		
    }
}
