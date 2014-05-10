<?php namespace Dream\Filters;

use Illuminate\Auth\AuthManager as Auth;
use Illuminate\Routing\Redirector as Redirect;

class GMFilter {

	/** 
	 *
	 * @var Illuminate\Auth\AuthManager
	 */
	protected $auth;

	/**
	 *
	 * @var Illuminate\Routing\Redirector;
	 */
	protected $redirect;

	/**
	 *
	 * @param Illuminate\Auth\AuthManager $auth
	 * @param Illuminate\Routing\Redirector $redirect
	 */
	public function __construct(Auth $auth, Redirect $redirect)
	{
		$this->auth = $auth;
		$this->redirect = $redirect;
	}

	/**
	 * Checks if the user is a GM
	 *
	 * @return 	void
	 */
	public function filter()
	{
		// if( Auth::guest() ) return Redirect::to('/');

		$user = $this->auth->user();
	
		if( ! $user->isGM() )
			return $this->redirect->to('/');
	}

}