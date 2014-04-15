<?php namespace Dream\Utility\HTML;

use Illuminate\Http\Request;

class Link {

	public function isActive($link)
	{
		return (Request::is($link))
			? 'class="active"'
			: '';
	}
	
}