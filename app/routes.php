<?php

/*
|--------------------------------------------------------------------------
| Player Panel Routes
|--------------------------------------------------------------------------
*/



Route::group(array('prefix'	=> 'panel'), function()
{

	/**
	 *
	 * @link panel/mall/*
	 */
	Route::controller('mall', 'MallController');

	/**
	 *
	 * @link panel/vote/*
	 */
	Route::controller('vote', 'VoteAPIController');

	/**
	 *
	 * @link panel/donate
	 */
	Route::controller('donate', 'DonationController');

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

	/**
	 * Item Controller (for Mall)
	 * @link admin/item/*
	 */
	Route::resource('item', 'ItemController');

	/**
	 * Dashboard Controller 
	 * @link admin/order/*
	 */
	Route::controller('order', 'OrderController');

	/**
	 * Dashboard Controller 
	 * @link admin/user/*
	 */
	Route::resource('user', 'UserController');
});

/**
 * Launcher API
 *
 * @link /n/
 */
Route::group(array('prefix' => 'n'), function()
{
	Route::get('/', 'LauncherController@getNews');
	Route::get('/dream/', 'LauncherController@getPatchDir');
	Route::get('/dream/patch.txt', 'LauncherController@getPatchNote');
});

/**
 * 
 * @link test
 */
Route::get('test', function()
{
	// return View::make('pages.test');
	// return strtolower(Str::random(12));
	$missing = User::all();

	foreach($missing as $user)
	{
		try {
			$model = VotePoint::where('user_id', $user->id)->firstOrFail();
		} catch(Illuminate\Database\Eloquent\ModelNotFoundException $e) {
			$vp = new VotePoint;
			$user->votePoint()->save($vp);
		}

		try {
			$model = DonationPoint::where('user_id', $user->id)->firstOrFail();
		} catch(Illuminate\Database\Eloquent\ModelNotFoundException $e) {
			$dp = new DonationPoint;
			$user->donationPoint()->save($dp);
		}
	}
});

Route::post('test', function()
{
	return View::make('pages.test');
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
Route::get('register', 'RegistrationController@getRegister');
Route::post('register', 'RegistrationController@postRegister');

/**
 * Handles all pages
 * @link /*
 */
Route::controller('/', 'HomeController');