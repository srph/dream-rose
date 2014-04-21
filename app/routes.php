<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Player Panel Routes
|--------------------------------------------------------------------------
*/

Route::group(array('prefix'	=> 'panel'), function()
{

	/**
	 *
	 * @link panel/vote/*
	 */
	Route::controller('vote', 'VoteAPIController');

	/**
	 *
	 * @link panel/user/*
	 */
	Route::controller('user', 'UserController');

	/**
	 *
	 * @link panel/*
	 */
	Route::controller('/', 'PanelController');
});


/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/

Route::group(array(
	'prefix'	=>	'admin',
	'before'	=>	'gm'
), function()
{
	/**
	 * Slide RESTful
	 * @link admin/slide/*
	 */
	Route::resource('slide', 'SlideController');

	/**
	 * News RESTful
	 * @link admin/news/*
	 */
	Route::resource('news', 'NewsController');

	/**
	 * Vote Links RESTful
	 * @link admin/vote-link/*
	 */
	Route::resource('vote-link', 'VoteLinkController');
});

Route::get('test', function()
{
	return Str::random('6');
});

/**
 * Fancy auth link
 * @link login/
 */
Route::post('login', 'AuthController@postLogin');

/**
 * Fancy deauth link
 * @link login/
 */
Route::get('logout', 'AuthController@getLogout');

/**
 * Fancy register link
 * @link register/
 */
Route::get('register', 'UserAPIController@getRegister');
Route::post('register', 'UserAPIController@postRegister');

/**
 * Handles all pages
 * @link /*
 */
Route::controller('/', 'HomeController');