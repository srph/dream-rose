<?php

use Carbon\Carbon;

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
		Cache::forget('updates');
		$offset = Config::get('dream.slide.offset');		

		if( !Cache::has('slides')) {
			$slides = $this->slide
				->orderBy('created_at', 'desc')
				->take($offset)
				->get();

			$minutes = Config::get('dream.caching.slides');
			$expiration = Carbon::now()->addMinutes($minutes);
			Cache::add('slides', $slides, $expiration);
		}

		$minutes = Config::get('dream.caching.slides');
		$expiration = Carbon::now()->addMinutes($minutes);

		if( !Cache::has('news') ) {
			$news = $this->news
				->getByType('news')
				->take(3)
				->get();

			Cache::add('news', $news, $expiration);
		}

		if( !Cache::has('updates') )  {
			$updates = $this->news
				->getByType('updates')
				->take(5)
				->get();

			Cache::add('updates', $updates, $expiration);
		}

		if( !Cache::has('events') ) {
			$events = $this->news
				->getByType('events')
				->take(5)
				->get();

			Cache::add('events', $events, $expiration);
		}

		$slides 	= Cache::get('slides');
		$news 		= Cache::get('news');
		$updates 	= Cache::get('updates');
		$events 	= Cache::get('events');

		return View::make('pages/home.index')
			->with('slides', $slides)
			->with('news', $news)
			->with('updates', $updates)
			->with('events', $events, $expiration);
	}


	/**
	 * Downloads
	 *
	 * @return 	Response
	 */
	public function getDownloads()
	{
		return View::make('pages/home.downloads');
	}


	/**
	 * Game info
	 *
	 * @return 	Response
	 */
	public function getInfo()
	{
		return View::make('pages/home.info');
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

		return View::make('pages/news.show')->with('news', $news);
	}


	/**
	 * Clan Ranking
	 *
	 * @return 	Response
	 */
	public function getClanRanking()
	{
		return View::make('pages/home/ranking.clan');
	}


	/**
	 * Player ranking
	 *
	 * @return 	Response
	 */
	public function getPlayerRanking()
	{
		return View::make('pages/home/ranking.user');
	}

}