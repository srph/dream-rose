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
	public function __construct(Slide $slide,
		News $news,
		Character $character,
		Clan $clan
	)
	{
		$this->slide = $slide;
		$this->news = $news;
		$this->character = $character;
		$this->clan = $clan;
	}

	/**
	 * Homepage
	 *
	 * @return 	Response
	 */
	public function getIndex()
	{
		$offset = Config::get('dream.slide.offset');		

		if( !Cache::has('slides')) {
			$slides = $this->slide
				->orderBy('id', 'desc')
				->take($offset)
				->get();

			$minutes = Config::get('dream.caching.slides');
			$expiration = Carbon::now()->addMinutes($minutes);
			Cache::add('slides', $slides, $expiration);
		}

		$minutes = Config::get('dream.caching.slides');
		$expiration = Carbon::now()->addMinutes($minutes);

		if( !Cache::has('news.articles') ) {
			$news = $this->news
				->getByType('news')
				->orderBy('id', 'desc')
				->take(3)
				->get()
				->load('user');

			Cache::add('news.articles', $news, $expiration);
		}

		if( !Cache::has('news.updates') )  {
			$updates = $this->news
				->getByType('updates')
				->orderBy('id', 'desc')
				->take(5)
				->get()
				->load('user');

			Cache::add('news.updates', $updates, $expiration);
		}

		if( !Cache::has('news.events') ) {
			$events = $this->news
				->getByType('events')
				->orderBy('id', 'desc')
				->take(5)
				->get()
				->load('user');

			Cache::add('news.events', $events, $expiration);
		}

		$slides 	= Cache::get('slides');
		$news 		= Cache::get('news.articles');
		$updates 	= Cache::get('news.updates');
		$events 	= Cache::get('news.events');

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
		if( !Cache::has('clan.ranking') ) {
			$clan 		= $this->clan->byTop(10, 'intLEVEL')->get();
			$expiration = Carbon::now()->addMinutes(10);
			Cache::add('clan.ranking', $clan, $expiration);
		}

		$clan = Cache::get('clan.ranking');

		return View::make('pages/home/ranking.clan')
			->with('clan', $clan);
	}


	/**
	 * Player ranking
	 *
	 * @return 	Response
	 */
	public function getPlayerRanking()
	{
		if( !Cache::has('characters.ranking') ) {
			$characters = $this->character->byTop(10, 'btLEVEL')->get();
			$expiration = Carbon::now()->addMinutes(10);
			Cache::add('characters.ranking', $characters, $expiration);
		}

		$characters = Cache::get('characters.ranking');

		return View::make('pages/home/ranking.character')
			->with('characters', $characters);
	}

}