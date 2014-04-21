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

	/**
	 *
	 * @var Slide
	 */
	protected $slide;

	/**
	 * Apply filter and inject dependencies
	 *
	 * @param 	Slide 	$slide
	 */
	public function __construct(Slide $slide)
	{
		$this->slide = $slide;
	}

	/**
	 * Homepage
	 *
	 * @return 	Response
	 */
	public function getIndex()
	{
		$slides = $this->slide
			->orderBy('created_at', 'desc')
			->take(5)
			->get();

		$view = View::make('pages/home.index')
			->with('slides', $slides);;

		if( Auth::guest() ) return $view;

		return $view->with('user', Auth::user());
			
	}


	/**
	 * Downloads
	 *
	 * @return 	Response
	 */
	public function getDownloads()
	{
		$view = View::make('pages/home.downloads');

		return (Auth::guest())
			? $view
			: $view->with('user', Auth::user());
	}


	/**
	 * Game info
	 *
	 * @return 	Response
	 */
	public function getInfo()
	{
		$view = View::make('pages/home.info');

		return (Auth::guest())
			? $view
			: $view->with('user', Auth::user());
	}


	/**
	 * Clan Ranking
	 *
	 * @return 	Response
	 */
	public function getClanRanking()
	{
		$view = View::make('pages/home/ranking.clan');

		return (Auth::guest())
			? $view
			: $view->with('user', Auth::user());
	}


	/**
	 * Player ranking
	 *
	 * @return 	Response
	 */
	public function getPlayerRanking()
	{
		$view = View::make('pages/home/ranking.user');

		return (Auth::guest())
			? $view
			: $view->with('user', Auth::user());
	}


}