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

Route::get('test', function()
{
	// return Hash::make('pogi');
	return new Link;
});

/**
 * Handles all pages
 * @link /*
 */
Route::controller('/', 'HomeController');

/**
 * Handles player panel routes
 */
Route::group(array(
	'prefix'	=>	'panel',
	'before'	=>	'auth'
), function()
{
	/**
	 *
	 * @link panel/user
	 */
	Route::resource('user', 'UserController');
});