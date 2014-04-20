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
		$view = View::make('pages/home.index');

		return (Auth::guest())
			? $view
			: $view->with('user', Auth::user());
	}

	public function getDownloads()
	{
		$view = View::make('pages/home.downloads');

		return (Auth::guest())
			? $view
			: $view->with('user', Auth::user());
	}

	public function getInfo()
	{
		$view = View::make('pages/home.info');

		return (Auth::guest())
			? $view
			: $view->with('user', Auth::user());
	}

	public function getClanRanking()
	{
		$view = View::make('pages/home/ranking.clan');

		return (Auth::guest())
			? $view
			: $view->with('user', Auth::user());
	}

	public function getPlayerRanking()
	{
		$view = View::make('pages/home/ranking.user');

		return (Auth::guest())
			? $view
			: $view->with('user', Auth::user());
	}
}