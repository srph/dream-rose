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

			'drop'	=> 30,
			'exp'	=> 30,
			'item' 	=> 30,

		),

		'address' => 'dream-rose.com',

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
		'item'   => 'uploads/item',

	),

	/*
	|--------------------------------------------------------------------------
	| Module Configs
	|--------------------------------------------------------------------------
	|
	| Settings for each module
	|
	*/

	'footer' => array(

		'message' => '&copy; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget elit porttitor'

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

			'width' => '387',
			'height' => '162'

		),

	),

	'links' => array(

		'interval' => 12,

		'restriction' => true

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

		'ports'  => 10,
		'slides' => 10,
		'news'   => 10,
		'links'	 => 10

	),

);