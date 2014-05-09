<?php

class PanelController extends BaseController {

	/**
	 *
	 * @var User
	 */
	protected $user;

	/**
	 *
	 * @var Order
	 */
	protected $order;

	/**
	 * Apply filter and inject dependencies
	 *
	 *
	 */
	public function __construct(User $user, Order $order)
	{
		$this->user = $user;
		$this->order = $order;
		$this->beforeFilter('csrf', array('on' => array('put, post')));
	}

	/**
	 * Show account overview
	 *
	 * @return 	Response
	 */
	public function getAccountOverview()
	{
		return View::make('pages/panel.overview');
	}

	/**
	 * Update the authenticated user
	 *
	 * @return 	Response
	 */
	public function putAccountOverview()
	{
		// Input password
		$input 	= Input::all();
		$old 	= Input::get('old_password');
		$new 	= Input::get('password');
		$user 	= Auth::user();

		// Validate
		$validation = $user->validate($input, $user->id);

		if($validation->passes()) {
			if( $user->changePassword($old, $new) ) {
				return Redirect::to('panel/account-overview')
					->with('user-update-success', 'placeholder');
			}

			$error = 'Old password was incorrect';
		}

		if(is_null($old) || empty($old)) $error = 'Old password is required.';
		// Check if an error message already exists
		if(empty($error)) $error = null;

		return Redirect::to('panel/account-overview')
			->with('user-updated-error', $error)
			->withErrors($validation);
	}

	/**
	 * Display characters
	 *
	 * @return 	Response
	 */
	public function getYourCharacters()
	{
		return View::make('pages/panel.character');
	}

	public function getYourOrders()
	{
		$user = Auth::user();
		$orders = $user
			->orders()
			->withTrashed()
			->orderBy('id', 'desc')
			->paginate(10);

		return View::make('pages/panel.orders')
			->with('orders', $orders);
	}
	
}