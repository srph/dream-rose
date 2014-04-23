<?php namespace Dream\Utility\Http;

class Port {

	/**
	 * Address to be checked
	 * @var string
	 */
	protected $address;


	/**
	 * Port to be checked
	 * @var port
	 */
	protected $port;


	/**
	 * Creates an instance of this class
	 *
	 * @param 	string 		$address
	 * @param 	integer 	$port
	 */
	public function __construct($address, $port)
	{
		$this->address = $address;
		$this->port = $port;
	}


	/**
	 * {@inherit}
	 *
	 * @param 	string 		$address
	 * @param 	integer 	$port
	 */
	public static function check($address, $port)
	{
		$status = new static($address, $port);

		return $status->attempt();
	}


	/**
	 * Attempts to check if address and port returns a response
	 *
	 * @return 	boolean
	 */
	protected function attempt()
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->address);
		curl_setopt($curl, CURLOPT_PORT, $this->port);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
	    // curl_setopt($curl, CURLOPT_HEADER, true);
	    // curl_setopt($curl, CURLOPT_NOBODY, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		curl_close($curl);

		if( $response ) return true;

		return false;
	}

}