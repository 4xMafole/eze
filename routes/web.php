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

	Route::get('/landing', function() {
		return view('landing');
	})->name('landing')->middleware('guest');

	//Routes for authentication
		//new users(registrations)
		Route::get('/register', 'AuthController@getRegister')->name('register')->middleware('guest');
		Route::post('/register', 'AuthController@postRegister');
		//users(login)
		Route::get('/guest', 'AuthController@getLogin')->name('login')->middleware('guest');
		Route::post('/guest', 'AuthController@postLogin');

//authenticated users routes
	//explore 
	Route::get('/explore','ExploreController@index' )->name('explore')->middleware('auth');
		//searching user
		Route::get('/explore/find', 'SearchController@query')->name('search')->middleware('auth');
		//user profile
		Route::get('/explore/{id}', 'ExploreController@profile')->middleware('auth');
		//user challenge
		Route::get('/explore/{id}/challenges', 'ExploreController@userChallenges')->middleware('auth');

	//home || filter 
	Route::get('/home', 'FilterController@index')->name('filter')->middleware('auth');

	//filter
	Route::get('/filter', 'FilterController@index')->name('filter')->middleware('auth');
		//post uploader
		Route::post('/filter/post', 'FilterController@poster')->name('poster')->middleware('auth');	
		//challenger uploader
		Route::post('/filter/challenge', 'FilterController@challenge')->name('challenge')->middleware('auth');

	//profile
	Route::get('/profile','ProfileController@index')->name('profile')->middleware('auth');
		//user_challenges
		Route::get('/profile/challenges', 'ProfileController@userChallenges')->name('user-challenges')->middleware('auth');

		//username edits
		Route::post('/profile','ProfileController@usernameUpdate')->name('username-edit')->middleware('auth');
		//avatar edits
		Route::post('/profile/avatar','ProfileController@avatarUpdate')->name('avatar-edit')->middleware('auth');
		//follow toggle
		Route::post('/profile/follow', 'ProfileController@follow')->name('follow')->middleware('auth');

		//lit toggle
		Route::post('/profile/lit', 'ProfileController@lit')->name('lit')->middleware('auth');
		//logout
		Route::get('/profile/logout', 'ProfileController@logout')->name('logout')->middleware('auth');


