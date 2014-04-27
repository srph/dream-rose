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
	protected $fillable = array('user_id', 'vote_link_id', 'ip');

	/**
	 * Checks whether the model uses timestamps
	 *
	 * @var boolean
	 */
	public $timestamps = true;


	/**
	 * Verifies if the vote is valid
	 *
	 * @param 	integer 	$id
	 * @param 	string 	 	$ip
	 * @return 	boolean
	 */
	public static function validate(User $user, $id, $ip)
	{
		$user->load('logs');
		// First, it looks for whether the user has logs.
		// Then, it checks if the ip of the current request matches
		// the latest log.
		// Otherwise, it will automatically return true.
		if( $user->logs->count() ) {

			$ipWithUserExists = $user->logs()
				->where('ip', $ip)
				->get()
				->count();

			if( $ipWithUserExists ) {

				$log = $user->logs()					
					->where('vote_link_id', $id)
					->where('ip', $ip)
					->orderBy('id', 'desc')
					->first();

				if( !empty($log) ) return $log->intervalValid();

			} else {

				$log = $user->logs()
					->where('vote_link_id', $id)
					->orderBy('id', 'desc')
					->first();

				if ( !empty($log) ) return $log->intervalValid();

			}
		} else {

			$log = self::where('ip', $ip)
				->where('vote_link_id', $id)
				->orderBy('id', 'desc')
				->first();

			if( !empty($log) ) return $log->intervalValid();
		}

		return true;
	}


	/**
	 *
	 *
	 *
	 */
	public function intervalValid()
	{
		$config 		= Config::get('dream.links');
		$interval 		= $config['interval'];
		$db 			= strtotime( $this->created_at );
		$now 			= Carbon::now();
		$logged 		= Carbon::createFromTimestamp( $db );

		if ( $logged->diffInHours($now) >= 12 ) {
			return true;
		}

		return false;
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