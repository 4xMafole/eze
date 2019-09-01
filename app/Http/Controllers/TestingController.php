<?php

namespace eze\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Webp;
use eze\Models\Avatar;

class TestingController extends Controller
{
    public function index()
    {
    	return view('testing');
    }

    //This function works properly than I can ever imagine..
    public function image(Request $request)
    {

        /**
         * Saving to the local storage and retriving the images
         */
    	$file = $request->file('image');

        $filename = $file->getClientOriginalName();
        $info = pathinfo($filename);
        //removes the extension part
        $file_name = basename($filename,'.'.$info['extension']);

        // dd($info);
        $webp = Webp::make($file)->quality(0);
        $webpPath = Storage::disk('webp')->makeDirectory('testing/');

        $webp->save(storage_path('/app/public/webp/testing/'.$file_name.'.webp'));



    	return view('testing');

    }
}
