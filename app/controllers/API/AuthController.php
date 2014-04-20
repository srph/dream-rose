<?php

class AuthController extends BaseController {

	/**
	 * Apply filter and inject dependencies
	 *
	 *
	 */
	public function __construct()
	{
		// Filter
		$this->beforeFilter('csrf', array('on' => array('post')));
		$this->beforeFilter('guest', array('only' => array('postLogin')));
		$this->beforeFilter('auth', array('only' => array('getLogout')));
	}

	/**
	 * Attempt to authenticate user with provided input
	 *
	 * @return 	Response
	 */
	public function postLogin()
	{
		// Initialize data
		$username = Input::get('username');
		$password = Input::get('password');
		$remember = Input::get('remember');

		$data = array(
			'Account'	=>	$username,
			'password'	=>	$password
		);

		if( Auth::attempt($data, $remember) ) {
			return Response::json(array('status' => true));
		}

		return Response::json(array('status' => false));
	}

	/**
	 * Logout the authenticated user
	 *
	 * @return 	Response
	 */
	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
}