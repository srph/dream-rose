<?php namespace Dream\Events;

use Illuminate\Auth\AuthManager as Auth;
use Illuminate\Cache\Repository as Cache;
use Illuminate\View\Environment as View;

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
	 *
	 * @param 	Illuminate\Auth\AuthManager 	$auth
	 * @param 	Illuminate\Cache\Repository 	$cache
	 * @param 	Illuminate\View\Environment 	$view
	 */
	public function __construct(Auth $auth, Cache $cache, View $view)
	{
		$this->auth = $auth;
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