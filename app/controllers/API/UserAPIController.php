<?php

class UserAPIController extends BaseController {

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
		$this->beforeFilter('csrf', array('on' => array('post')));
		$this->beforeFilter('guest');
	}

	/**
	 * Display registration form
	 *
	 * @return 	Response
	 */
	public function getRegister()
	{
		$view = View::make('pages/user.create');

		return (Auth::guest())
			? $view
			: $view->with('user', Auth::user());
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
		// Validate
		$validation = $user->validate($input);
		if($validation->passes()) {
			$user->Account 		= Input::get('username');
			$user->Email 		= Input::get('email');
			$user->MD5PassWord 	= Hash::make(Input::get('password'));
			$user->FirstName 	= Input::get('fname');
			$user->LastName 	= Input::get('lname');
			$user->MotherLName 	= Input::get('mname');

			// Create his vote point
			$vp = new VotePoint;

			if($user->save() && $user->votePoints()->save($vp)) {
				return Response::json(array('status' => true));
			}
		}

		return Response::json(array('status' => false));
	}
	
}