<?php namespace Dream\Utility;

use Illuminate\Support\ServiceProvider;
use Dream\Utility\HTML\Link;

class UtilityServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider
	 *
	 * @return 	void
	 */
	public function register()
	{
		$this->app->bind('link', function()
		{
			return new Link;
		});
	}
	
}