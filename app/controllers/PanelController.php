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
	 * Show account overview
	 *
	 * @return 	Response
	 */
	public function getAccountOverview()
	{
		return View::make('pages/user.show');
	}

	/**
	 * Display characters
	 *
	 * @return 	Response
	 */
	public function getYourCharacters()
	{
		return View::make('pages/panel.character');
	}
	
}