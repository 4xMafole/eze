<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Avatar;

class SearchController extends Controller
{
    /**
     * Query function searches in the database if there is related username.
     * @param Request - requests for the input with name 'f'.
     * @return returns username which is mostly like or definitively it in the given query.
     *
     */
    public function query(Request $request)
    {
    	$user = User::where('username', 'LIKE', '%'.$request->f.'%')->get(['id', 'username'])->reverse();

        return $user;
    	
    }
}
