<?php

class UserAPIController extends BaseController {

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
		$username = Input::get('username');

		// Validate
		$validation = $user->validate($input);
		if($validation->passes()) {
			$user->id 			= $user->incrementID();
			$user->Account 		= $username;
			$user->Email 		= Input::get('email');
			$user->MD5PassWord 	= Hash::make(Input::get('password'));
			$user->FirstName 	= Input::get('fname');
			$user->LastName 	= Input::get('lname');
			$user->MotherLName 	= Input::get('mname');

			if($user->save()) {
				$user 	= User::where('Account', $username)->first();

				// Create his vote point
				$vp 	= new VotePoint;
				if($user->votePoint()->save($vp)) {
					return View::make('pages/user.create-success');
				}
			}
		}

		return Redirect::to('register')
			->withErrors($validation)
			->withInput();
	}
	
}