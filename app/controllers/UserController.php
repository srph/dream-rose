<?php

class UserController extends \BaseController {

	/**
	 *
	 * @var User
	 */
	protected $user;

	/**
	 * Apply filter and inject dependencies
	 *
	 * @param 	User 	$user
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
		$this->beforeFilter('csrf', array('on' => array('put, post')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user
			->orderBy('Account', 'asc')
			->paginate(10);

		return View::make('pages/user.index')
			->with('users', $users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->user->find($id);

		if( is_null($user) )
			return Redirect::to('admin/dashboard');

		return View::make('pages/user.show')
			->with('user', $user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->find($id);

		if( is_null($user) )
			return Redirect::to('admin/user');

		return View::make('pages/user.edit')
			->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Grab all input
		$input = Input::all();

		// Grab user with the id of $id
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


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
