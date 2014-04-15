<?php namespace Dream\Hasher;

use Illuminate\Support\ServiceProvider;

class HasherServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider
	 *
	 * @return 	void
	 */
	public function register()
	{
		$this->app['hash'] = $this->app->share(function()
		{
			return new MD5;
		});
	}

	/**
	 * Get the services provided by the provider
	 *
	 * @return 	array
	 */
	public function provides()
	{
		return array('hash');
	}
}