<?php

use Dream\Utility\Http\Port;

// Temporary
// Event Listeneer
// Because I'm a pussy for TDD
// or even logs
// Event::listen('illuminate.query', function($query)
// {
// 	var_dump($query);
// });

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
	Route::resource('vote-links', 'VoteLinkController');
});

/**
 * 
 * @link test
 */
Route::get('test', function()
{
	// $ahead 	= strtotime(Carbon\Carbon::now()->addHours(12));
	// $now 	= strtotime(Carbon\Carbon::now() );
	// // return  $now - $ahead;

	// return strtotime("12 hours") - $now;
	// $news = User::first()
	// 	->news()
	// 	->where('id', 20)
	// 	->get()
	// 	->count();
	// if ( ! $news )
	// 	return 'pota';
	// else
	// 	return $news;
	// $ip = 
	// User::all();
	// $user = User::first();
	// $id = VoteLink::first()->id;
	// $ip = Request::getClientIp();
	// return '\'' . VoteLog::validate($user, $id, $ip) . '\'';

	// $log = $user->logs()
	// 	->where('ip', $ip)
	// 	->where('vote_link_id', $id)
	// 	->orderBy('id', 'desc')
	// 	->first();
	// 	$a = Carbon\Carbon::createFromTimestamp(strtotime($log->created_at));
	// 	$b = Carbon\Carbon::now();

		// echo $log->intervalValid();

	// return $log;

	// echo Config::get('dream.links.restriction');
	// $link = VoteLink::first();
	// $ip = Request::getClientIp();
	// $log = $link->logs()
	// 		->where('ip', '=', $ip)
	// 		->orderBy('created_at', 'desc')
	// 		->first();

	// return $log;

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