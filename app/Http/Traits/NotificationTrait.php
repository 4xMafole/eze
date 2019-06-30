<?php

namespace eze\Http\Traits;

use Illuminate\Support\Collection;

use Auth;
use eze\Models\User;
use eze\Models\Avatar;
use eze\Models\Challenge;


trait NotificationTrait
{

	// Chanotify algorithm 
	public function chanotify()
	{
 		//followings_id
 		$followings_id = auth()->user()->followings()->get(['id'])->reverse();


 		$user_array = array();

 		foreach ($followings_id as $followings_id) 
 		{

	 		//challenger_id
	 		$challenger_id = Challenge::where('user', $followings_id->id)->pluck('user');

	 		if($challenger_id->isEmpty() == false)
	 		{
		 		//user
		 		$user_array[] = User::where('id',$challenger_id)->get();
	 		}


 		}

 		$user_collection = collect($user_array);

		return $user_collection;
 		
	}
	
	//Linotify algorithm
	public function linotify()
	{
		// current user id
		$user_id = Auth::id();

		//challenge id
		$challenge_id = Challenge::where('user', $user_id)->orWhere('challenger', $user_id)->get(['id']);

		$liters_array = array();

		foreach ($challenge_id as $challenge_id) 
		{
			// challenge
			$challenge = Challenge::find($challenge_id->id);

			$liters_array[] = $challenge->likers()->get()->reverse();

		}

		$liters_collection = collect($liters_array);


		return $liters_collection;
	}
}