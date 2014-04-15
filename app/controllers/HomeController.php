<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		return View::make('pages/home.index');
	}

	public function getDownloads()
	{
		return View::make('pages/home.downloads');
	}

	public function getInfo()
	{
		return View::make('pages/home.info');
	}

	public function getClanRanking()
	{
		return View::make('pages/home/ranking.clan');
	}

	public function getPlayerRanking()
	{
		return View::make('pages/home/ranking.user');
	}
}