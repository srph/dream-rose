<?php namespace Dream\Events;

use Carbon\Carbon;
use Illuminate\Auth\AuthManager as Auth;
use Illuminate\Cache\Repository as Cache;
use Illuminate\View\Environment as View;
use Illuminate\Config\Repository as Config;

class ViewEventHandler {

	/**
	 *
	 * @var Illuminate\Auth\AuthManager
	 */
	protected $auth;

	/**
	 *
	 * @var Illuminate\Cache\Repository
	 */
	protected $cache;

	/**
	 *
	 * @var Illuminate\View\Environment
	 */
	protected $view;

	/**
	 *
	 * @var Illuminate\View\Environment
	 */
	protected $config;

	/**
	 *
	 *
	 * @param 	Illuminate\Auth\AuthManager 	$auth
	 * @param 	Illuminate\Cache\Repository 	$cache
	 * @param 	Illuminate\View\Environment 	$view
	 * @param 	Illuminate\Config\Repository 	$config
	 */
	public function __construct(Auth $auth, Cache $cache, View $view, Config $config)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->cache = $cache;
		$this->view = $view;
	}

	/**
	 * Share variables across views
	 *
	 * @param 	void
	 */
	public function share()
	{
		$this->view->share('v4us', $this->cache->get('vote.links') );
		$this->view->share('server', $this->cache->get('server.ports') );

		if ( $this->auth->check() ) $this->view->share( 'auth', $this->auth->user() );
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
			'view.share',
			'Dream\Events\ViewEventHandler@share'
		);
	}

}