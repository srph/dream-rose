<?php

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

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
	public function __construct(News $news,
		Character $character,
		Clan $clan,
		Collection $collection)
	{
		$this->news = $news;
		$this->character = $character;
		$this->clan = $clan;
		$this->collection = $collection;
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
		$gm = $this->user->GM()->get();

		foreach($gm as $user)
		{
			$count += $user->characters->count();
		}

		$collection = $this->character
			->with('user')
			->orderBy('btLEVEL', 'desc')
			->take($count)
			->get();

		$characters = $collection->filter(function($character)
		{
			return ! $character->user->isGM();
		});

		$newCollection = $this->collection->make();

		foreach($characters as $key => $value)
		{
			$newCollection->add($value);
		}

		return View::make('pages/home/ranking.character')
			->with('characters', $newCollection);
	}

}