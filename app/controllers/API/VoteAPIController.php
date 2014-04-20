<?php

class VoteAPIController extends BaseController {

	/**
	 * Show links list
	 *
	 * @return 	Response
	 */
	public function getIndex()
	{
		$user = Auth::user();
		// $user->load('')
		return View::make('pages/vote.index')
			->with('user', $user);
	}
	
}