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

		return View::make('pages/home.index')->with('slides', $slides);			
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