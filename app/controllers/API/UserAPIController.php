<?php

class UserAPIController extends BaseController {

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


		// Validate
		$validation = $this->user->validate($input);
		if($validation->passes()) {
			$user = $this->user;
			$username = Input::get('username');
			$user->id 			= $user->incrementID();
			$user->Account 		= $username;
			$user->Email 		= Input::get('email');
			$user->MD5PassWord 	= Hash::make(Input::get('password'));
			$user->FirstName 	= Input::get('fname');
			$user->LastName 	= Input::get('lname');
			$user->MotherLName 	= Input::get('mname');
			$user->MailIsConfirm = 1;
			$user->Right 		= 1;

			if( $user->save() ) {
				$user 	= User::where('Account', $username)->first();

				// Create his vote point and donation point table
				$vp = $this->vp;
				$dp = $this->dp;

				if( $user->votePoint()->save($vp) &&
					$user->donationPoint()->save($dp) ) {
					return View::make('pages/user.create-success');
				}
			}
		}

		return Redirect::to('register')
			->withErrors($validation)
			->withInput();
	}
	
}