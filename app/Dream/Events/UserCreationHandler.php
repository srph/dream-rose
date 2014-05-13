<?php namespace Dream\Events;

use DonationPoint;
use VotePoint;

class UserCreationHandler {

	/**
	 *
	 * @var User
	 */
	protected $user;

	/**
	 *
	 * @var DonationPoint
	 */
	protected $dp;

	/**
	 *
	 * @var VotePoint
	 */
	protected $vp;

	/**
	 * Create an instance of $this->class
	 *
	 * @param 	VotePoint 		$vp
	 * @param 	DonationPoint 	$dp
	 */
	public function __construct(VotePoint $vp, DonationPoint $dp)
	{
		$this->vp = $vp;
		$this->dp = $dp;
	}

	/**
	 * Handle the event
	 *
	 */
	public function handle(User $user)
	{
		$this->user = $user;

		$this->createVP();
		$this->createDP();
	}

	/**
	 * Create the VP of the user
	 *
	 * @return 	boolean;
	 */
	protected function createVP()
	{
		$vp = $this->vp;

		return $this->user->vp()->save($p);
	}

	/**
	 * Create the VP of the user
	 *
	 * @return 	boolean;
	 */
	protected function createDP()
	{
		$vp = $this->dp;

		return $this->user->dp()->save($dp);
	}

	/**
	 * Subscribe to events
	 *
	 */
	public function subscribe($event)
	{
		$event->listen(
			'user.creation', 
			'Dream\Events\UserCreationHandler'
		);
	}
}