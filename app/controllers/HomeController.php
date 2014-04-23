<?php

class HomeController extends BaseController {

	/**
	 *
	 * @var Slide
	 */
	protected $slide;

	/**
	 *
	 * @var News
	 */
	protected $news;

	/**
	 * Apply filter and inject dependencies
	 *
	 * @param 	Slide 	$slide
	 * @param 	News 	$news
	 */
	public function __construct(Slide $slide, News $news)
	{
		$this->slide = $slide;
		$this->news = $news;
	}

	/**
	 * Homepage
	 *
	 * @return 	Response
	 */
	public function getIndex()
	{
		$offset = Config::get('dream.slide.offset');

		$slides = $this->slide
			->orderBy('created_at', 'desc')
			->take($offset)
			->get();

		$view = View::make('pages/home.index')
			->with('slides', $slides);

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
	 * Show requested news
	 *
	 * @param 	int 	$id
	 * @return 	Response
	 */
	public function getNews($id)
	{
		$news = $this->news->find($id);
		$view = View::make('pages/news.show')->with('news', $news);

		return ( Auth::guest() )
			? $view
			: $view->with('user', Auth::user() );
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