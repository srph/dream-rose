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
			$characters = $this->character
				->orderBy('btLEVEL', 'desc')
				->get();
			$expiration = Carbon::now()->addMinutes(10);
			Cache::add('characters.ranking', $characters, $expiration);
		}

		$characters = Cache::get('characters.ranking');

		return View::make('pages/home/ranking.character')
			->with('characters', $characters);
	}

}