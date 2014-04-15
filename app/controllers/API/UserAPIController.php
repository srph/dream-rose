<?php

class UserAPIController extends BaseController {

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display registration form
	 *
	 * @return 	Response
	 */
	public function getRegister()
	{
		return View::make('pages/user.create');
	}

	/**
	 * Process the registration with the provided input
 	 *
	 * @return 	Response
	 */
	public function postRegister()
	{
		// Fetch all input
		$input = Input::all();

		$user = $this->user;
		// if($user->validate()) {
		$user->username 	= Input::get('username');
		$user->email 		= Input::get('email');
		$user->password 	= Input::get('password');
		$user->firstname 	= Input::get('first_name');
		$user->lastname 	= Input::get('last_name');

		if($user->save()) {
			return Response::json(array('status' => true));
		}

		return Response::json(array('status' => false));
	}
	
}