<?php namespace Dream\API\Paypal;

class Paypal {

	/**
	 *
	 * @var PaypalIPN\Notifier
	 */
	protected $notifier;

	/**
	 *
	 * @param 	PaypalIPN\Notifier
	 */
	public function __construct(PaypalIPN $notifier)
	{
		$this->notifier = $notifier;
	}
	
}