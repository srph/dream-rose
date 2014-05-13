<?php

class RegistrationController extends BaseController {

	/**
	 *
	 * @var User
	 */
	protected $user;
	
	/**
	 *
	 * @var VotePoint
	 */
	protected $vp;
	
	/**
	 *
	 * @var DonationPoint
	 */
	protected $dp;

	/**
	 * Apply filter and inject dependencies
	 *
	 * @param 	User 	$user
	 */
	public function __construct(User $user, VotePoint $vp, DonationPoint $dp)
	{
		$this->user = $user;
		$this->vp = $vp;
		$this->dp = $dp;

		// Filters
		$this->beforeFilter('guest');
		$this->beforeFilter('csrf', array('on' => array('post')));
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


		// Validate
		$validation = $this->user->validate($input);
		if ( $validation->passes() ) {
			$user 				= $this->user;
			$username 			= Input::get('username');
			$user->id 			= $user->incrementID();
			$user->Account 		= $username;
			$user->Email 		= Input::get('email');
			$user->MD5PassWord 	= Hash::make(Input::get('password'));
			$user->FirstName 	= Input::get('fname');
			$user->LastName 	= Input::get('lname');
			$user->MotherLName 	= Input::get('mname');
			$user->Right 		= 1;
			$user->MailIsConfirm = 1;

			if( $user->save() ) {
				$user 	= User::where('Account', $username)->first();

				// Create his vote point and donation point table
				Event::fire('user.creation', $user);

				return View::make('pages/user.create-success');
			}
		}

		return Redirect::to('register')
			->withErrors($validation)
			->withInput();
	}
	
}