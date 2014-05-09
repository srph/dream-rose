<?php

class AdminController extends BaseController {

	/**
	 *
	 * @var User
	 */
	protected $user;

	/**
	 * Register filters
	 *
	 * @param User $user
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
		$this->beforeFilter('gm');
		$this->beforeFilter('csrf', array('on' => array('post', 'put', 'delete')));
	}

	/**
	 * Shows all users
	 *
	 * @return 	Response
	 */
	public function getIndex()
	{
		$users = $this->user
			->orderBy('Account', 'asc')
			->paginate(10);

		return View::make('pages/user.index')
			->with('users', $users);
	}

	/**
	 * Fetches the user with the requested id
	 *
	 * @param 	integer 	$id
	 * @return 	Response
	 */
	public function getUser($id)
	{
		$user = $this->user->find($id);

		if( !is_null($user) )
			return Redirect::to('admin/dashboard');

		return View::make('pages/user.edit')
			->with('user', $user);
	}

	/**
	 * Updates the user with the requested id
	 *
	 * @param 	integer 	$id
	 * @return 	Response
	 */
	public function putUser($id)
	{
		// Grab all input
		$input = Input::all();
		$user = $this->user->find($id);

		if( !is_null($user) ) return Redirect::to('admin/dashboard');

		$validation = $this->user->validForUpdate($input);

		if( $validation->passes() ) {
			$user->Email 				= Input::get('email');
			$user->MD5PassWord 			= Hash::make(Input::get('password'));
			$user->FirstName 			= Input::get('fname');
			$user->LastName 			= Input::get('lname');
			$user->MotherLName 			= Input::get('mname');
			$user->MailIsConfirm 		= 1;
			$user->Right 				= 1;
			$user->votePoints->count	= Input::get('vote_points');
			$user->donationPoints->count = Input::get('donation_points');

			if( $user->push() ) {
				return Redirect::back()
					->with('user-updated-success', '');
			}
		}

		return Redirect::back()
			->withErrors()
			->withInput();
	}
}