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
		$query = Input::has('query')
			? $this->user->where('Account', 'like', '%' . Input::get('query') . '%')
			: $this->user;

		$users = $query
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
			return Redirect::route('admin.user.index');

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

		if( is_null($user) )
			return Redirect::route('admin.user.index');

		$validation = $this->user->validate($input, $user->id);

		// return Input::get('activated');

		if( $validation->passes() ) {
			
			if( Input::has('password') ) {
				$old = Input::get('old_password');
				$new = Input::get('password');
				$user->changePassword($old, $new);
			}

			$user->Email 				= Input::get('email');
			// $user->MD5PassWord 			= Hash::make(Input::get('password'));
			$user->FirstName 			= Input::get('fname');
			$user->LastName 			= Input::get('lname');
			// $user->MotherLName 			= Input::get('mname');
			$user->MailIsConfirm 		= Input::get('activated');
			$user->Right 				= Input::get('gm_lv');
			$user->votePoint->count		= Input::get('vp');
			$user->donationPoint->count = Input::get('dp');

			if( $user->push() ) {
				return Redirect::back()
					->with('user-updated-success', '');
			}
		}

		return Redirect::back()
			->withErrors($validation)
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
