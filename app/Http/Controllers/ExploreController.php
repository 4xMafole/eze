<?php

namespace eze\Http\Controllers;

use Illuminate\Http\Request;

use eze\Models\Avatar;
use eze\Models\User;
use eze\Models\Post;
use eze\Models\Challenge;

class ExploreController extends Controller
{

	public function index()
	{	
        $user_post_id = Challenge::pluck('user_post_id');
	    $posts = Post::find($user_post_id)->pluck('post')->reverse();

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

	public function postChallenges()
	{
		$challenges = Challenge::all()->reverse();

		return view("post_challenges")->with(['challenge' => $challenges]);
	}

	public function fly(Request $request)
	{
		$user = User::find($request->user_id);
		$data = auth()->user()->toggleFollow($user);
		$id = $request->user_id;

		return response()->json(['success' => $data, 'id' => $id]);
	}

//custom functions

}
