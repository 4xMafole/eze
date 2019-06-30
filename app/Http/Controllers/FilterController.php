<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Challenge;
use App\Models\Avatar;

class FilterController extends Controller
{
    
	public function index()
	{
		$challenge = Challenge::all()->reverse();
	
		return view('filter')->with(['challenge' => $challenge]);
	}

	public function poster(Request $request)
	{
		//checks if the input contains file needed
		if ($request->hasFile('post'))
		{
			//validates if the file in the image having extensions i.e jpeg or png.
			$request->validate(
				[
					'post' => 'mimes:jpeg,png',
				]
			);

			$user_id = Auth::id();

			//the file is stored into storage folder 
			$new_post = $request->file('post');
			$post_path = storage::disk('photo')->put('posts', $new_post);

			//the file is stored into the database for further processing
			$posts = new Post();
			$posts->post = $post_path;
			$posts->user = $user_id;
			$posts->save(); 


		}

		return redirect()->back();
	}

	public function challenge()
	{
		//user id
		$user = Auth::id();
		//finds user id in the posts.
		$post = Post::find($user);
		$cpost = Post::where('user', '!=', $user)->get();

		if ($post != null && $cpost->isEmpty() == false)
		{

			//Gets all posts in the challenge Model
			//user post
			$user_challenge = Challenge::pluck('user_post');
			//challenger post
			$challenged_post = Challenge::pluck('challenger_post');

			//INFO:: POSTS ARE CHOOSED RANDOMLY.

			//user
				// {{ error:: it returns all values without using foreach. }}
				//user id
				$user_id = Auth::id();
				//user post
				$user_post = Post::where('user', '=', $user_id)->pluck('post')->random();
				//user post id
				$user_post_id = Post::where('post', $user_post)->pluck('id');
				//user avatar
				$user_avatar = Avatar::where('user', '=', $user_id)->pluck('avatar');
				//user's name
				$user_name = User::where('id', '=', $user_id)->pluck('username');

			//challenger
				//{{ error:: it returns all values without using foreach. }}
				//challenger post
				$challenger_post = Post::where('user', '!=', $user_id)->pluck('post')->random();
				//challenger post id
				$challenger_post_id = Post::where('post', $challenger_post)->pluck('id');

				//challenger id
				$challenger_id = Post::where('post', $challenger_post)->pluck('user');
				//challenger avatar
				$challenger_avatar = Avatar::where('user', '=', $challenger_id)->pluck('avatar');
				//challenger's name
				$challenger_name = User::where('id', '=', $challenger_id)->pluck('username');

	        /**
	         * If condition makes sure that the posts do not repeat themselves in the database.
	         */
		        if ($user_challenge->contains($user_post) || $user_challenge->contains($challenger_post) || $challenged_post->contains($challenger_post) || $challenged_post->contains($user_post) )
		        {

		          //redicting to the index function.
		          return redirect()->action('FilterController@index');
		        }
		        else
		        {     
		       	  //Declaring new challenge.
		          $challenge = new Challenge;

		          //user details
			          $challenge->user_post = $user_post;
			          $challenge->user = $user_id;
			          foreach ($user_post_id as $user_post_id)
			          {
			          	$challenge->user_post_id = $user_post_id;
			          }
			          foreach ($user_avatar as $user_avatar)
			          {
				          $challenge->user_avatar = $user_avatar;
			          }	     
			          foreach ($user_name as $user_name)
			          {
				          $challenge->user_name = $user_name;
			          } 

			   	  //challenger details  
			          $challenge->challenger_post = $challenger_post;
			          foreach ($challenger_post_id as $challenger_post_id)
			          {
			          	$challenge->challenger_post_id = $challenger_post_id;
			          }
			          foreach ($challenger_id as $challenger_id)
			          {
				          $challenge->challenger = $challenger_id;
			          }
			          foreach ($challenger_avatar as $challenger_avatar)
			          {
				          $challenge->challenger_avatar = $challenger_avatar;
			          }
			          foreach ($challenger_name as $challenger_name)
			          {
				          $challenge->challenger_name = $challenger_name;
			          }

		         $challenge->save();

	       	     //redicting to the index function.
			     return redirect()->action('FilterController@index');   
	        
		        }


		}
		else
		{
			//Give a info. that the user has no images in the gallary to get approved to take part in the challenges.

			return redirect()->action('FilterController@index');
		}

	}


}
