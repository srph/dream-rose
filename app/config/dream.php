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

			'width' => '801',
			'height' => '250'

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

	),
	
	/*
	|--------------------------------------------------------------------------
	| Download links
	|--------------------------------------------------------------------------
	|
	|
	*/
	
	'downloads' => array(
	
		'client' => 'https://mega.co.nz/#!WkYE0S5I!yg1Vq3NzMdKKMa4FCOtxtUubTChNumA9lkdlrWIg97U',
		'patch'  => null,
		
	),

);