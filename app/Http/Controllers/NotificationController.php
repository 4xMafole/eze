<?php

namespace eze\Http\Controllers;

use Illuminate\Http\Request;

use eze\Http\Traits\NotificationTrait;

class NotificationController extends Controller
{
	//trait
	use NotificationTrait;

    public function index()
    {
    	$following_challenge = $this->chanotify();
    	$user_lit = $this->linotify();

    	return view('sidelit')->with([
    		'following_challenge' => $following_challenge,
    		'user_lit' => $user_lit]);
    }

}
