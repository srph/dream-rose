<?php

class UserController extends \BaseController {

	/**
	 *
	 * @var User
	 */
	protected $user;

	/**
	 *
	 *
	 *
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
		$this->beforeFilter('csrf', array('on' => array('put, post')));
	}

	/**
	 * Update the authenticated user
	 *
	 * @return 	Response
	 */
	public function postUpdate()
	{
		// Input password
		$input 	= Input::all();
		$old 	= Input::get('old_password');
		$new 	= Input::get('password');
		$user 	= Auth::user();

		// Validate
		$validation = $user->validate($input, $user->id);

		if($validation->passes()) {
			if($user->changePassword($old, $new)) return Redirect::back()->with('success', 'placeholder');

			$error = 'Old password was incorrect';
		}

		// Check if an error message already exists
		if(empty($error)) $error = 'An error has occured';

		return Redirect::to('panel/account-overview')
			->with('error', $error)
			->withErrors($validation);
	}

}
