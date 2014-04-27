<?php

use Carbon\Carbon;

class VoteLog extends Eloquent {

	/**
	 * Table used by the model
	 *
	 * @var string
	 */
	protected $table = 'vote_logs';

	/**
	 * Fields fillable by the model
	 *
	 * @var array
	 */
	protected $fillable = array();

	/**
	 * Checks whether the model uses timestamps
	 *
	 * @var boolean
	 */
	public $timestamps = false;


	public function validate()
	{
		$user = Auth::user();
		if($this->)
	}


	protected function validateInterval()
	{
		$config 		= Config::get('dream.links');
		$ipRestriction 	= $config['restriction'];
		$interval 		= $config['interval'];
		$now 			= Carbon::now();
		$requirement 	= strtotime($interval);

		$timestamp = array(
			'now'		=>	strtotime( $now ),
			'ahead'		=>	strtotime( $now->addHours( $interval ) )
		);

		if ( $ahead - $now === $requirement ) {

		}
	}

	/*
	|--------------------------------------------------------------------------
	| ORM
	|--------------------------------------------------------------------------
	*/

	/**
	 * ORM with the [User] table
	 *
	 * @return 	User 
	 */
	public function user()
	{
		return $this->belongsTo('user');
	}
}