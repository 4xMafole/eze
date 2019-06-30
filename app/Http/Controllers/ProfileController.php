<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Models\User;
use App\Models\Avatar;
use App\Models\Post;
use App\Models\Challenge;


class ProfileController extends Controller
{
    
    public function index()
    {
        //avatar display
        $avatar = Avatar::pluck('user');

        //post display
        $post = Post::pluck('user');
        //user id
        $user_id  = User::find(Auth::id());

        return view('profile')->with(['avatar' => $avatar, 'post' => $post, 'user_id' => $user_id]);
        
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
            $this->challengeUsernameUpdate($new_username);
            $this->challengedUsernameUpdate($new_username);
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

            //checks if the user has uploaded a profile avatar
            //if yes- the latest one gets added while the old one
            if (User::find($user)->avatar) 
            {

              Storage::disk('photo')->delete(User::find($user)->avatar->avatar);
              $user_avatar = User::find($user)->avatar;
              $user_avatar->avatar = $avatar_path; 
              $user_avatar->save();
              //this function below has problems in using model relationships
                $this->challengeAvatarUpdate($avatar_path);
                $this->challengedAvatarUpdate($avatar_path);
            }
            else
            {        
                $avatar = new Avatar();
                $avatar->avatar = $avatar_path;
                $avatar->user = $user;
                $avatar->save();
                //this function below has problems in using model relationships
                $this->challengeAvatarUpdate($avatar_path);
                $this->challengedAvatarUpdate($avatar_path);

            }

            // Storage::disk('photo')->putFile('avatars', $new_avatar);
        }


        return redirect()->back();
    }

    public function follow(Request $request)
    {
        $user = User::find($request->user_id);
        $data = auth()->user()->toggleFollow($user);
        $count = $user->followers()->get()->count();

        return response()->json(['success' => $data, 'counter' => $count]);
    }

    public function lit(Request $request)
    {

        $challenge = Challenge::find($request->challenge_id);
        $data = auth()->user()->toggleLike($challenge);
        $count = $challenge->likers()->get()->count();
        //challenge id
        $challenge_id = $request->challenge_id;

        return response()->json(['success' => $data, 'counter' => $count, 'challengeId' => $challenge_id]);
    }

    public function userChallenges()
    {
        //user id
        $user_id = Auth::id();

        //user challenges
        $challenge = Challenge::where('user', $user_id)->get()->reverse();
        $challenge_user = Challenge::where('user', $user_id)->pluck('user')->first();

        //challenger challenges
        $challenged = Challenge::where('challenger', $user_id)->get()->reverse();

        $challenged_user = Challenge::where('challenger', $user_id)->pluck('challenger')->first();

        return view('user_challenges')->with(['challenged_user' => $challenged_user, 'challenge_user' => $challenge_user,'challenge' => $challenge, 'challenged' => $challenged]);

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }


//custom functions 

    //you challenged.
        //challenge updations i.e username and avatar
        public function challengeUsernameUpdate(String $username)
        {
                //updating username in challenges
                $user = User::find(Auth::id())->challenge_post;

                foreach ($user as $user)
                {
                    if($user->user == Auth::id())
                    {
                        $user->user_name = $username;
                    }

                    elseif($user->challenger == Auth::id())
                    {
                        $user->challenger_name = $username;
                    }

                    $user->save();
                }

        }

        public function challengeAvatarUpdate(String $avatar)
        {
                //updating avatar in challenges
                $user = User::find(Auth::id())->challenge_post;


                foreach($user as $user)
                {
                    if($user->user == Auth::id())
                    {
                        $user->user_avatar = $avatar;
                    }
                    elseif ($user->challenger == Auth::id())
                    {
                        $user->challenger_avatar = $avatar;
                    }

                    $user->save();
                }
        }

    //challenged you.
        //challenge updations i.e username and avatar
        public function challengedUsernameUpdate(String $username)
        {
                //updating username in challenges
                $user = User::find(Auth::id())->challenged_post;

                foreach ($user as $user)
                {
                    if($user->user == Auth::id())
                    {
                        $user->user_name = $username;
                    }

                    elseif($user->challenger == Auth::id())
                    {
                        $user->challenger_name = $username;
                    }

                    $user->save();
                }

        }

        public function challengedAvatarUpdate(String $avatar)
        {
                //updating avatar in challenges
                $user = User::find(Auth::id())->challenged_post;


                foreach($user as $user)
                {
                    if($user->user == Auth::id())
                    {
                        $user->user_avatar = $avatar;
                    }
                    elseif ($user->challenger == Auth::id())
                    {
                        $user->challenger_avatar = $avatar;
                    }

                    $user->save();
                }
        }



}
