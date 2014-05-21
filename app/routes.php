<?php

/*
|--------------------------------------------------------------------------
| Player Panel Routes
|--------------------------------------------------------------------------
*/

/*
$missing = User::has('VotePoint', '=', 0)->get();

if( !$missing->empty() )
{
	foreach($missing as $user)
	{
		$vp = new VotePoint;		
		$user->votePoint()->save($vp);
	}
}

$missing = User::has('DonationPoint', '=', 0)->get();

if( !$missing->empty() )
{
	foreach($missing as $user)
	{
		$dp = new DonationPoint;
		$user->donationPoint()->save($dp);
	}
}
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
 * 
 * @link test
 */
Route::get('test', function()
{
	// return View::make('pages.test');
	// return strtolower(Str::random(12));
	$users = User::all();

	foreach($users as $user)
	{
		// VotePoint::firstOrCreate(array('user_id' => $user->id));
		
		try {
			VotePoint::where('user_id', $user->id)->firstOrFail();
		} catch(Illuminate\Database\Eloquent\ModelNotFoundException $e) {	
			VotePoint::create(array('user_id' => $user->id));
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