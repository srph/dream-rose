<?php namespace Dream\API\Paypal;

use Illuminate\Http\Request;
use Dream\API\Paypal\Exceptions\InvalidResponseException;
use Illuminate\Log\Writer as Log;

class PaypalIPN {

	/**
	 *
	 * @var Illuminate\Http\Request
	 */
	protected $request;

	/**
	 *
	 * @var Illuminate\Log\Writer
	 */
	protected $log;
	
	/**
	 * Holds all decoded data
	 * @var array
	 */
	protected $decoded;

	/**
	 *
	 * @param Illuminate\Http\Request $request
	 * @param Illuminate\Log\Writer $log
	 */
	public function __construct(Request $request, Log $log)
	{
		$this->request = $request;
		$this->log = $log;
	}

	/**
	 * Run the listener and throw exceptions if weird occurences occur
	 *
	 * @return 	void
	 */
	public function run()
	{
		// Test cURL response
		$response = $this->listen();

		// Inspect IPN validation result and act accordingly
		if( /*! (strcmp($response, "VERIFIED") == 0) ||*/ strcmp($response, "INVALID") == 0 )
		{
			// Error message
			$error = 'Invalid paypal response! Throwing InvalidResponseException';

			// Log the error message
			$this->log->error($error);

			// Throw an exception
			throw new InvalidResponseException;
		}
	}

	/**
	 * Listen to paypal's events
	 *
	 * @return 	cURL|void
	 */
	protected function listen()
	{
		$fields = $this->getFields();

		$ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}

	/**
	 * Get fields from the input stream to be passed to
	 * the IPN
	 *
	 * @return 	string
	 */
	protected function getFields()
	{
		// Get request instance
		$request = $this->request->instance();

		// Reading POSTed data directly from $_POST causes serialization
		// issues with array data in the POST. Decode the raw post data
		// from the input stream
		$this->decode($request);

		// Read the IPN message sent from PayPal and prepend string
		$fields = $this->stringify();

		return $fields;
	}

	/**
	 * Decode the raw post data from the input stream
	 *
	 * @return 	void
	 */
	protected function decode($request)
	{
		// Separate all elements with ampersand in between
		$raw = explode('&', $request);

		// Seperate raw data value from its key
		// e.g. foo=bar -> data[foo] = bar
		foreach($raw as $data)
		{
			$data = explode('=', $data);

			if(count($data) == 2)
			{
				$this->decoded[$data[0]] = urldecode($data[1]);
			}
		}
	}

	/**
	 * Read the IPN message sent from PayPal
	 * and prepend provided string
	 *
	 * @param 	string 	$prepend
	 * @return 	string
	 */
	protected function stringify($prepend = 'cmd=_notify-validate')
	{
		$fields = $prepend;

		foreach($this->decoded as $key => $value) {
			$value = ( $this->checkMagicQuotesGPC() )
				? urlencode( stripslashes($value) )
				: urlencode( $value );

			$fields .= "&{$key}={$value}";
		}

		return $fields;
	}

	/**
	 * Check if get_magic_quotes_gpc exists and is switched on
	 *
	 * @return 	boolean
	 */
	protected function checkMagicQuotesGPC()
	{
		return ( function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc() == 1 )
			? true
			: false;
	}
	
}