<?php

class DonationController extends BaseController {

	/**
	 *
	 * @var User
	 */
	protected $user;

	/**
	 *
	 * @param 	User 	$user
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
		$this->beforeFilter('force.ssl');
	}

	/**
	 *
	 *
	 * @return 	Response
	 */
	public function getIndex()
	{
		//
	}

}