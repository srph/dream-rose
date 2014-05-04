<?php namespace Dream\Composers;

use Carbon\Carbon;
use News;
use Slide;
use Illuminate\Cache\Repository as Cache;
use Illuminate\Config\Repository as Config;

class PropagandaComposer {

	/**
	 *
	 * @var News
	 */
	protected $news;

	/**
	 *
	 * @var Slide
	 */
	protected $slide;

	/**
	 *
	 * @var Illuminate\Cache\Repository
	 */
	protected $cache;

	/**
	 *
	 * @var Illuminate\View\Environment
	 */
	protected $config;

	/**
	 *
	 *
	 * @param 	Slide 							$slide
	 * @param 	News 						 	$news
	 * @param 	Illuminate\Cache\Repository 	$cache
	 * @param 	Illuminate\Config\Repository 	$config
	 */
	public function __construct(Slide $slide, News $news, Cache $cache, Config $config)
	{
		$this->slide = $slide;
		$this->news = $news;
		$this->config = $config;
		$this->cache = $cache;
	}

	/**
	 * Composer variables to our homepage
	 *
	 * @param 	Illuminate\View\Environment 	$view
	 * @return 	void
	 */
	public function compose($view)
	{
		$this->cachePropaganda();

		$events 	= $this->cache->get('news.events');
		$updates 	= $this->cache->get('news.updates');
		$news 		= $this->cache->get('news.articles');
		$slides 	= $this->cache->get('slides');

		$view->with('news', $news)
			->with('updates', $updates)
			->with('events', $events)
			->with('slides', $slides);
	}

	/**
	 * Cache all propaganda
	 *
	 * @return 	void
	 */
	protected function cachePropaganda()
	{
		$slidesExp 	= $this->config->get('dream.caching.slides');
		$newsExp 	= $this->config->get('dream.caching.news');

		$slidesExp 	= Carbon::now()->addMinutes($slidesExp);
		$newsExp 	= Carbon::now()->addMinutes($newsExp);


		if( !$this->cache->has('news.articles') )
			$this->cacheNews($slidesExp);

		if( !$this->cache->has('news.updates') )
			$this->cacheUpdates($newsExp);

		if( !$this->cache->has('news.events') )
			$this->cacheEvents($newsExp);

		if( !$this->cache->has('slides') )
			$this->cacheSlides($newsExp);
	}

	/**
	 * Fetch and cache news
	 *
	 * @param 	integer 	$expiration
	 * @param 	integer 	$offset
	 * @return 	void
	 */
	protected function cacheNews($expiration, $offset = 3)
	{
		$news = $this->news
			->getByType('news')
			->orderBy('id', 'desc')
			->take($offset)
			->get()
			->load('user');

		$this->cache->add('news.articles', $news, $expiration);
	}

	/**
	 * Fetch and cache updates
	 *
	 * @param 	integer 	$expiration
	 * @param 	integer 	$offset
	 * @return 	void
	 */
	protected function cacheUpdates($expiration, $offset = 5)
	{
		$updates = $this->news
			->getByType('updates')
			->orderBy('id', 'desc')
			->take($offset)
			->get()
			->load('user');

		$this->cache->add('news.updates', $updates, $expiration);
	}

	/**
	 * Fetch and cache events
	 *
	 * @param 	integer 	$expiration
	 * @param 	integer 	$offset
	 * @return 	void
	 */
	protected function cacheEvents($expiration, $offset = 5)
	{
		$events = $this->news
			->getByType('events')
			->orderBy('id', 'desc')
			->take($offset)
			->get()
			->load('user');

		$this->cache->add('news.events', $events, $expiration);
	}

	/**
	 * Fetch and cache slides
	 *
	 * @param 	integer 	$expiration
	 * @param 	integer 	$offset
	 * @return 	void
	 */
	protected function cacheSlides($expiration, $offset = 5)
	{
		$slides = $this->slide
			->orderBy('id', 'desc')
			->take($offset)
			->get()
			->load('user');

		$this->cache->add('slides', $slides, $expiration);
	}

}