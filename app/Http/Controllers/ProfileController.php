<?php

namespace eze\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Validator;
use Auth;
use eze\Models\User;
use eze\Models\Avatar;
use eze\Models\Post;
use eze\Models\Challenge;


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

    public function password()
    {
        return view('password');
    }

    public function changePassword(Request $request)
    {
        //requested data
        $current_password = $request->get('current_password');
        $new_password = $request->get('new_password');
        $new_password_confirmation =$request->get('new_password_confirmation');

        /**
         * if statement - ensures that the input fields are not empty.
         */
        
        if($current_password != "" && $new_password != "" && $new_password_confirmation != "")
        {

            if (!(\Hash::check($current_password, Auth::user()->password))) 
            {
                $c_error = "Current password does not match the old password.";
                // The passwords matches
                return response()->json(['c_error' => $c_error]);
            }

            elseif(strcmp($current_password, $new_password) == 0)
            {
                $n_error = "New password cannot be the same as your current password.";
                //Current password and new password are same
                return response()->json(['n_error' => $n_error]);
            }

            $validatedData = Validator::make($request->all(),[
                'current_password' => 'required',
                'new_password' => 'required|string|min:6|confirmed',
            ]);

            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->get('new_password'));
            $user->save();

            $success = "Password changed successfully!";

            // return 
            return response()->json(['success' => $success]);
        }
        else
        {
            $all_error = "All fields must be filled.";
            // The passwords matches
            return response()->json(['all_error' => $all_error]);            
        }


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

    //password
        // public function checkPassword($current_password, $new_password)
        // {


        //         if (!(\Hash::check($current_password, Auth::user()->password))) 
        //         {
        //             $c_error = "Current password does not match the old password.";
        //             // The passwords matches
        //             return response()->json(['c_error' => $c_error]);
        //         }

        //         elseif(strcmp($current_password, $new_password) == 0)
        //         {
        //             $n_error = "New password cannot be the same as your current password.";
        //             //Current password and new password are same
        //             return response()->json(['n_error' => $n_error]);
        //         }
        //         else
        //         {
        //             return;
        //         }    
        // }        

}
