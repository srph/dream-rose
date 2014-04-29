<?php namespace Dream\Events;

use Carbon\Carbon;
use Dream\Utility\Http\Port;
use Illuminate\Cache\Repository as Cache;
use Illuminate\Config\Repository as Config;

class ServerEventHandler {

	/**
	 *
	 * @var Illuminate\Cache\Repository
	 */
	protected $cache;

	/**
	 *
	 * @var Illuminate\Config\Repository
	 */
	protected $config;

	/**
	 *
	 *
	 * @param 	Illuminate\Cache\Repository 	$cache
	 * @param 	Illuminate\Config\Repository 	$config
	 * @return 	void
	 */
	public function __construct(Cache $cache, Config $config)
	{
		$this->cache = $cache;
		$this->config = $config;
	}

	/**
	 * Checks server status, and caches to improve
	 * application performance
	 *
	 * @return  void
	 */
	public function statusCheck()
	{
		if( ! $this->cache->has('server.ports') ) {
			$config = $this->config->get('dream.info');

			$ports = array(
				'char'	=> $config['ports']['char'],
				'login'	=> $config['ports']['login'],
				'world'	=> $config['ports']['world']
			);

			$address = $config['address'];

			$status = array(
				'char'	=> Port::check($address, $ports['char']),
				'login'	=> Port::check($address, $ports['login']),
				'world'	=> Port::check($address, $ports['world'])
			);

			$lifetime 	= $this->config->get('dream.caching.ports');
			$expiration = Carbon::now()->addMinutes($lifetime);
			$this->cache->add('server.ports', $status, $expiration);
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
			'server.status.check',
			'Dream\Events\ServerEventHandler@statusCheck'
		);
	}

}