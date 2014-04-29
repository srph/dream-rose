<?php

class VoteAPIController extends BaseController {

	/**
	 *
	 *
	 * @param 	VoteLink 	$vote
	 * @param 	VoteLog 	$log
	 */
	public function __construct(VoteLink $vote, VoteLog $log)
	{
		$this->log = $log;
		$this->vote = $vote;
		$this->beforeFilter('auth');
	}

	/**
	 * Show links list
	 *
	 * @return 	Response
	 */
	public function getIndex($id = null)
	{
		if ( is_null($id) )  {
			$links = $this->vote->all();
			return View::make('pages/vote/api.list')
				->with('links', $links);
		}

		$link = $this->vote->find($id);
		if ( empty($link) ) return Redirect::to('admin/vote-links');
	}

	/**
	 * Increment VP
	 *
	 * @param 	int 		$id
	 * @return 	Response
	 */
	public function getResponse($id)
	{
		$link = $this->vote->find($id);
		if ( empty($link) ) return Redirect::to('admin/vote-links');

		$user 		= Auth::user();
		$ip 		= Request::getClientIp();
		$interval 	= Config::get('dream.links.interval');

		$response = ( $this->log->mark($user, $link, $ip) );

		return View::make('pages/vote/api.response')
			->with('response', $response)
			->with('link', $link)
			->with('interval', $interval);
	}
	
}