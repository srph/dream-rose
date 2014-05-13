<?php namespace Dream\Filters;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector as Redirect;

class SSLFilter {

	/**
	 * Instance of SSL Filter
	 *
	 * @param Request 	$request
	 * @param Redirect 	$redirect
	 */
	public function __construct(Redirect $redirect, Request $request)
	{
		$this->request 	= $request;
		$this->redirect = $redirect;
	}

	/**
	 * Force a route to be served on HTTPS
	 *
	 * @return 	void|Redirect
	 */
	public function filter()
	{
		$request = $this->request;

		if( ! $request->secure() )
		{
			$uri = $request->getRequestUri();

			return $this->redirect->secure( $uri );
		}
	}
}