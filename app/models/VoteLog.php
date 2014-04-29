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
	public static function validate(User $user, VoteLink $link, $ip)
	{
		$user->load('logs');

		// Check if IP should be validated, too.
		$restriction = Config::get('dream.links.restriction');

		// Checks if the ip of the current request exists in the logs.
		// Then validates if the rule exists.
		// Otherwise, checks if the user has a log in the last 24 hours,
		// and validates.

		if ($restriction) {
			if ( ( $log = self::checkLastIPLog($link, $ip) ) ) {
				if ( ! self::intervalValid($log) ) {
					return false;
				}
			}
		}

		// Check if the user has logs
		if( $user->logs->count() ) {
			if( ( $log = self::checkLastUserLog($user, $link) ) ) {
				if ( ! self::intervalValid($log) ) {
					return false;
				}
			}
		}

		return true;
	}

	/**
	 * Verifes if the required interval is valid
	 *
	 * @return 	boolean
	 */
	public static function intervalValid($log)
	{
		$interval = Config::get('dream.links.interval');
		$log 	= strtotime( $log->created_at );
		$now 	= Carbon::now();
		$logged = Carbon::createFromTimestamp( $log );

		if ( $logged->diffInHours($now) >= $interval ) {
			return true;
		}

		return false;
	}

	/**
	 * Checks the logs if the IP exists.
	 *
	 * @param 	VoteLink 	$link
	 * @param 	string 		$ip
	 * @return 	VoteLog|bool
	 */
	public static function checkLastIPLog(VoteLink $link, $ip)
	{
		$log = $link->logs()
			->where('ip', $ip)
			->orderBy('created_at', 'desc')
			->first();

		if ( is_null($log) ) return false;

		return $ip;
	}

	/**
	 * Checks the user's last log on the the vote link
	 *
	 * @param 	User 		$user
	 * @param 	VoteLink 	$link
	 * @return 	VoteLog|bool
	 */
	public static function checkLastUserLog(User $user, VoteLink $link)
	{
		$log = $user->logs()
			->where('vote_link_id', $link->id)
			->orderBy('created_at', 'desc')
			->first();

		if ( is_null($log) ) return false;

		return $log;
	}

	/**
	 * Logs the user with its current ip on requested link
	 *
	 * @param 	User 		$user
	 * @param 	VoteLink 	$link
	 * @param 	integer 	$ip
	 * @return 	boolean
	 */
	public static function mark(User $user, VoteLink $link, $ip)
	{
		if ( self::validate($user, $link, $ip) ) {
			$log 				= new self;
			$log->vote_link_id 	= $link->id;
			$log->ip 			= $ip;

			if ( $user->logs()->save($log) ) return true;
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
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * ORM with the [Link] table
	 *
	 * @return 	Link
	 */
	public function links()
	{
		return $this->belongsTo('VoteLink', 'vote_link_id');
	}

}