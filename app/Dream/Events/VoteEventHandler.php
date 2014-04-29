<?php namespace Dream\Events;

use VoteLink;
use Carbon\Carbon;
use Illuminate\Cache\Repository as Cache;
use Illuminate\Config\Repository as Config;

class VoteEventHandler {

	/**
	 *
	 * @var VoteLink
	 */
	protected $link;

	/**
	 *
	 * @var Illuminate\Cache\CacheManager
	 */
	protected $cache;

	/**
	 *
	 * @var Illuminate\Config\Repository
	 */
	protected $config;

	/**
	 *
	 * @param 	VoteLink 						$link
	 * @param 	Illuminate\Cache\Repository 	$cache
	 * @param 	Illuminate\Config\Repository 	$config
	 * @return 	void
	 */
	public function __construct(VoteLink $link, Cache $cache, Config $config)
	{
		$this->link = $link;
		$this->cache = $cache;
		$this->config = $config;
	}

	/**
	 * Fetch all vote links
	 *
	 * @param 	void
	 */
	public function fetch()
	{
		if( ! $this->cache->has('vote.links') ) {
			$votes = $this->link->all();

			$lifetime 	= $this->config->get('dream.caching.links');
			$expiration = Carbon::now()->addMinutes($lifetime);
			$this->cache->put('vote.links', $votes, $expiration);
		}
	}

	/**
	 * Subscribe to events
	 *
	 * @param 	Events 	$events
	 * @return 	void
	 */
	public function subscribe($events)
	{
		$events->listen(
			'vote.links.fetch',
			'Dream\Events\VoteEventHandler@fetch'
		);
	}
	
}