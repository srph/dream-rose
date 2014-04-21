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

		'ip'	=>	'127.0.0.1',

		'ports'	=> array(

			'char'   => 80,
			'login'  => 80,
			'world'  => 90,
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

		'slides'	=>	'uploads/slides',
		'news'		=>	'uploads/news'

	),

);