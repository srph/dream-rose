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
		$user = Auth::user();
		$user->load('votepoint');

		return View::make('pages/user.show')
			->with('user', $user);
	}

	/**
	 * Display characters
	 *
	 * @return 	Response
	 */
	public function getYourCharacters()
	{
		$user = Auth::user();
		$user->load('characters');

		return View::make('pages/panel.character')
			->with('user', $user);
	}
	
}