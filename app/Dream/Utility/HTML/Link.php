<?php namespace Dream\Utility\HTML;

use Illuminate\Http\Request;

class Link {

	/**
	 * Checks if link is active
	 *
	 * @param 	string 	$link
	 * @return 	boolean
	 */
	public function isActive($link)
	{
		return (Request::is($link))
			? 'class="active"'
			: '';
	}
	
}