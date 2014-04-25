<?php

use Dream\Utility\Http\Port;

// Temporary
// Event Listeneer
// Because I'm a pussy for TDD
// or even logs
Event::listen('illuminate.query', function($query)
{
	var_dump($query);
});

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

/**
 * 
 * @link test
 */
Route::get('test', function()
{
	return Config::get('dream.slides.sizes.width');
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