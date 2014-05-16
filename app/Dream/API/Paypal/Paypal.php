<?php namespace Dream\API\Paypal;

class Paypal {

	/**
	 *
	 * @var PaypalIPN\Notifier
	 */
	public $notifier;

	/**
	 *
	 * @param 	PaypalIPN\Notifier
	 */
	public function __construct(PaypalIPN $notifier)
	{
		$this->notifier = $notifier;
	}
	
}