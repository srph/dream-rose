<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Application Name
	|--------------------------------------------------------------------------
	|
	| This handles the name to be used throughout the application
	|
	*/

	'name' => 'Dream ROSE',

	/*
	|--------------------------------------------------------------------------
	| Server Information
	|--------------------------------------------------------------------------
	|
	| Information to be used and displayed
	|
	*/

	'info' => array(

		'rates'	=>	array(

			'drop'	=> 15,
			'exp'	=> 30,
			'zulie'	=> 10,

		),

		'address' => '198.100.154.162',

		'ports'	=> array(

			'char'   => 29000,
			'login'  => 29100,
			'world'  => 29200,
			
		),

	),

	/*
	|--------------------------------------------------------------------------
	| Upload Directory
	|--------------------------------------------------------------------------
	|
	| Paths to be used for file uploads to be used in the modules
	|
	*/

	'paths' => array(

		'slides' => 'uploads/slides',
		'news'   => 'uploads/news',
		'vote'   => 'uploads/vote_links',
		'item'   => 'uploads/items',

	),

	/*
	|--------------------------------------------------------------------------
	| Module Configs
	|--------------------------------------------------------------------------
	|
	| Settings for each module
	|
	*/

	// Footer Message

	'footer' => array(

		'message' => '&copy; 2014 Dream ROSE Online.'

	),

	'slides' => array(

		'sizes' => array(

			'width'  => 1150,			
			'height' => 180

		),

		'offset' => 5,

	),

	'news' => array(

		'sizes' => array(

			'width' => 801,
			'height' => 250

		)

	),

	'links' => array(

		'interval' => 12,

		'restriction' => true,

		'points' => 4,

	),

	/*
	|--------------------------------------------------------------------------
	| Caching Lifetime
	|--------------------------------------------------------------------------
	|
	| Length of cache lifecycle before expiration. This increases loading time,
	| however correct current data may arrive at a later time
	|
	*/

	'caching' => array(

		'ports'  => 1,
		'slides' => 5,
		'news'   => 5,
		'links'	 => 5,
		'online' => 5,

	),
	
	/*
	|--------------------------------------------------------------------------
	| Download links
	|--------------------------------------------------------------------------
	|
	| Links will be used by the downloads section
	|
	*/
	
	'downloads' => array(
	
		'client' => array(

			'link'   => 'https://mega.co.nz/#!q5QR3RDY!8g3i13XnoXyBYRkfVYDt0FYznyByNzpKUQ3UiIZqAEE',
			'size'   => '569MB',
			'update' => '11-23-2014',

		),

		'guide'  => 'http://dream-rose.com/forum',

		'patch'  => null,
		
	),

	/*
	|--------------------------------------------------------------------------
	| APIs
	|--------------------------------------------------------------------------
	|
	|
	*/

	'api' => array(

		'facebook' => array(

			// Link to the fan page
			// Used by all facebook apis / widgets
			'url' => 'https://www.facebook.com/dreamroseevo',

		),
	),

);