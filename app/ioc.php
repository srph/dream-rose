<?php

use Dream\Utility\Http\Port;
use Carbon\Carbon;

$app->before(function()
{

	/* Caching Server Ports */
	if( ! Cache::has('server.ports') ) {
		$config = Config::get('dream.info');

		$ports = array(
			'char'	=> $config['ports']['char'],
			'login'	=> $config['ports']['login'],
			'world'	=> $config['ports']['world']
		);

		$address = $config['address'];

		$status = array(
			'char'	=> Port::check($address, $ports['char']),
			'login'	=> Port::check($address, $ports['login']),
			'world'	=> Port::check($address, $ports['world'])
		);

		$lifetime 	= Config::get('dream.caching.ports');
		$expiration = Carbon::now()->addMinutes($lifetime);
		Cache::add('server.ports', $status, $expiration);
	}

	if( ! Cache::has('vote.links') ) {
		$votes = VoteLink::all();

		$lifetime 	= Config::get('dream.caching.links');
		$expiration = Carbon::now()->addMinutes($lifetime);
		Cache::put('vote.links', $votes, $expiration);
	}

	View::share('v4us', Cache::get('vote.links') );
	View::share('server', Cache::get('server.ports') );

	if( Auth::check() ) View::share('auth', Auth::user() );
});