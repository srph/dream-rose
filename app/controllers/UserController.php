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
			if($user->changePassword($old, $new)) return Redirect::back()->with('user-update-success', 'placeholder');

			$error = 'Old password was incorrect';
		}

		if(is_null($old) || empty($old)) $error = 'Old password is required.';
		// Check if an error message already exists
		if(empty($error)) $error = null;

		return Redirect::to('panel/account-overview')
			->with('user-update-error', $error)
			->withErrors($validation);
	}

}
