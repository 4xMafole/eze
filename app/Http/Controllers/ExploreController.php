<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Avatar;
use App\Models\User;
use App\Models\Post;
use App\Models\Challenge;

class ExploreController extends Controller
{
	public function index()
	{
		$posts = Post::pluck('post')->reverse();

		return view('explore')->with(['posts' => $posts]);
	}

	public function profile(int $id)
	{
		//avatar display
		$avatar = Avatar::pluck('user');

		//post display
		$post = Post::pluck('user');

		if(User::find($id))
		{
			$user_id = User::find($id);

			return view('search.profile')->with(['avatar' =>$avatar, 'post' => $post, 'user_id' => $user_id]);

		}
		else
		{
			return redirect()->action('ExploreController@index');
		}

	}

	public function userChallenges(int $id)
	{
		//user id
		$user_id = $id;
		//user's name
		$username = User::where('id', $user_id)->pluck('username');

         //user challenges
        $challenge = Challenge::where('user', $user_id)->get()->reverse();
        $challenge_user = Challenge::where('user', $user_id)->pluck('user')->first();

        //challenger challenges
        $challenged = Challenge::where('challenger', $user_id)->get()->reverse();

        $challenged_user = Challenge::where('challenger', $user_id)->pluck('challenger')->first();


        return view('search.user_challenges')->with(['challenged_user' => $challenged_user, 'challenge_user' => $challenge_user,'challenge' => $challenge, 'challenged' => $challenged, 'user_id' => $user_id, 'username' => $username]);

	}


//custom functions

}
