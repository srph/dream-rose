<?php

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
	 *
	 * @var User
	 */
	protected $user;

	/**
	 *
	 * @var Illuminate\Database\Eloquent\Collection
	 */
	protected $collection;

	/**
	 * Apply filter and inject dependencies
	 *
	 * @param 	Slide 	$slide
	 * @param 	News 	$news
	 */
	public function __construct(News $news,
		Character $character,
		Clan $clan,
		User $user,
		Collection $collection)
	{
		$this->news = $news;
		$this->character = $character;
		$this->clan = $clan;
		$this->user = $user;
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
		try {
			$news = $this->news->findOrFail($id);
		} catch(ModelNotFoundException $e) {
			return Redirect::to('/');
		}

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
		$count = 0;

		foreach($gm as $user)
		{
			$count += $user->characters->count();
		}

		$collection = $this->character
			->orderBy('btLEVEL', 'desc')
			->take($count + 10)
			->get();

		$characters = $collection->filter(function($character)
		{
			return ! $character->user->isGM();
		});

		$newCollection = $this->collection;

		foreach($characters as $key => $value)
		{
			$newCollection->add($value);
		}

		$newCollection->reduce(10);

		return View::make('pages/home/ranking.character')
			->with('characters', $newCollection);
	}

}