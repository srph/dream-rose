<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Redirector as Redirect;

class SSLFilter {

	/**
	 * Instance of SSL Filter
	 * @param Request 	$request
	 * @param Response 	$response
	 * @param Redirect 	$redirect
	 */
	public function __construct(Response $response, Redirect $redirect, Request $request)
	{
		$this->request 	= $request;
		$this->response = $response;
		$this->redirect = $redirect;
	}

	/**
	 * Force a route to be served on HTTPS
	 *
	 */
	public function filter()
	{
		if( ! $this->request->secure() )
		{
			$uri = $this->request->getRequestUri();

			return $redirect->secure( $uri );
		}
	}
}