<?php

use Carbon\Carbon;

class HomeController extends BaseController {

	/**
	 *
	 * @var News
	 */
	protected $news;

	/**
	 *
	 * @var Clan
	 */
	protected $clan;

	/**
	 *
	 * @var Character
	 */
	protected $character;

	/**
	 * Apply filter and inject dependencies
	 *
	 * @param 	Slide 	$slide
	 * @param 	News 	$news
	 */
	public function __construct(News $news, Character $character, Clan $clan)
	{
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
		return View::make('pages/home.index');
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
		$clan = $this->clan
			->orderBy('intLEVEL', 'desc')
			->take(10)
			->get();

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
		$characters = $this->character
			->orderBy('btLEVEL', 'desc')
			->take(10)
			->get();

		return View::make('pages/home/ranking.character')
			->with('characters', $characters);
	}

}