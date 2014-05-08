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

}
