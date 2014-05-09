<?php

use Dream\API\Paypal\Paypal;
use Dream\API\Paypal\Exceptions\InvalidResponseException;

class DonationController extends BaseController {

	/**
	 *
	 * @var User
	 */
	protected $user;

	/**
	 *
	 * @var Dream\API\Paypal\Paypal
	 */
	protected $paypal;

	/**
	 *
	 * @param 	User 	$user
	 * @param 	Dream\API\Paypal\Paypal $paypal
	 */
	public function __construct(User $user, Paypal $paypal)
	{
		$this->user = $user;
		$this->paypal = $paypal;

		// Filters
		$this->beforeFilter('auth');
		$this->beforeFilter('csrf', array('on' => array('put', 'post', 'delete')));
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

	/**
	 * Listen to paypal
	 *
	 * @return 	Response
	 */
	public function postListen()
	{
		// Instantiate the paypal notifier
		$notifier = $this->paypal->notifier;

		try {
			// Run the notifier
			$notifier->run();

		} catch(InvalidResponseException $e) {
			return Redirect::to('/');
		}

		// Fetch the authenticated user
		$user = Auth::user();

		// Fetch the amount donated and compute total points to add
		$amount = Input::get('payment_status');
		$total 	= $amount * 4;

		// Add DP
		$user->addDP($total);
		return 'Success!';
	}

}