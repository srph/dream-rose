<?php

class PanelController extends BaseController {

	/**
	 *
	 * @var User
	 */
	protected $user;

	/**
	 * Apply filter and inject dependencies
	 *
	 *
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * 
	 *
	 * @return 	Response
	 */
	public function getAccountOverview()
	{
		return View::make('pages/user.show')
			->with('user', Auth::user());
	}
}