<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//everyone routes
	Route::get('/privacy', 'SettingController@privacy')->name('privacy');
	Route::get('/terms&conditions', 'SettingController@terms')->name('terms');
	Route::get('/aboutus', 'SettingController@aboutus')->name('aboutus');

//guest routes
	Route::get('/', function () {
	    return view('index');
	})->name('index')->middleware('guest');
	Route::get('/form', function() {
		return view('form');
	})->middleware('guest');

	//Routes for authentication
		//new users(registrations)
		Route::get('/register', 'AuthController@getRegister')->name('register')->middleware('guest');
		Route::post('/register', 'AuthController@postRegister');
		//users(login)
		Route::get('/guest', 'AuthController@getLogin')->name('login')->middleware('guest');
		Route::post('/guest', 'AuthController@postLogin');

//authenticated users routes
	Route::get('/explore', function () {
	    return view('explore');
	})->name('explore')->middleware('auth');

	Route::get('/home', function () {
	    return view('filter');
	})->name('filter')->middleware('auth');

	Route::get('/filter', function () {
	    return view('filter');
	})->name('filter')->middleware('auth');	

	Route::get('/profile','ProfileController@index')->name('profile')->middleware('auth');

	//username edits
	Route::post('/profile','ProfileController@usernameUpdate')->name('username-edit')->middleware('auth');
	//avatar edits
	Route::post('/profile/avatar','ProfileController@avatarUpdate')->name('avatar-edit')->middleware('auth');

	//logout
	Route::get('/profile/logout', 'ProfileController@logout')->name('logout')->middleware('auth');


