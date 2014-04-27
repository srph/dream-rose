<?php

class VoteAPIController extends BaseController {

	/**
	 * Show links list
	 *
	 * @return 	Response
	 */
	public function getIndex($id = null)
	{
		if ( is_null($id) ) return View::make('pages/vote/api.list');

		$link = $this->vote->find($id);
		if ( empty($link) ) return Redirect::to('admin/vote-links');

		return View::make('pages/vote/api.response');
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

		return Redirect::to($link->link);
	}
	
}