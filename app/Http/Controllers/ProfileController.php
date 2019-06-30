<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Models\User;
use App\Models\Avatar;


class ProfileController extends Controller
{
    
    public function index()
    {
        $avatar = User::find(Auth::id())->avatar->avatar;

    	return view('profile')->with(['avatar' => $avatar]);
    }

    public function usernameUpdate(Request $request)
    {
    	$request->validate(
    		[
    			'username' => 'min:5',
    		]
    	);

    	$new_username = $request->input('username');
    	$user_id = Auth::id();
    	$user = User::find($user_id);
    	if ($new_username != "") 
    	{
	    	$user->username = $new_username;
	    	$user->save();
    	}

    	return redirect()->back();
    }

    public function avatarUpdate(Request $request)
    {
        if ($request->hasFile('avatar'))
        {        
            $request->validate(
                [
                    'avatar' => 'mimes:jpeg,png',
                ]
            );

            $user = Auth::id();
            $new_avatar = $request->file('avatar');
            $avatar_path = Storage::disk('photo')->putFile('avatars', $new_avatar);

            if (User::find($user)->avatar) 
            {

              Storage::disk('photo')->delete(User::find($user)->avatar->avatar);
              $user_avatar = User::find($user)->avatar;
              $user_avatar->avatar = $avatar_path; 
              $user_avatar->save();
            }
            else
            {        
                $avatar = new Avatar();
                $avatar->avatar = $avatar_path;
                $avatar->user = $user;
                $avatar->save();
            }

            Storage::disk('photo')->putFile('avatars', $new_avatar);
        }


        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }
}
