<?php

class Character extends Base {

	/**
	 * Connection used by the model
	 *
	 * @var string
	 */
	protected $connection = 'sho';

	/**
	 * Table used by the model
	 *
	 * @var string
	 */
	protected $table = 'tblgs_avatar';

	/**
	 * Fields fillable by the model
	 *
	 * @var array
	 */
	protected $guarded = array('*');

	/**
	 * Checks whether the model uses timestamps
	 *
	 * @var boolean
	 */
	public $timestamps = false;

	/**
	 * Decode the job name of the given ID
	 *
	 * @return 	string
	 */
	public function getJobName()
	{
		switch( $this->job ) {
			case 0:
				$job = 'Visitor';
				break;
			case 111:
				$job = 'Solider';
				break;
			case 221:
				$job = 'Muse';
				break;
			case 311:
				$job = 'Hawker';
				break;
			case 411:
				$job = 'Dealer';
				break;
			case 121:
				$job =  'Knight';
				break;
			case 122:
				$job = 'Champ';
				break;
			case 221:
				$job = 'Mage';
				break;
			case 222:
				$job = 'Cleric';
				break;
			case 321:
				$job = 'Raider';
				break;
			case 322:
				$job = 'Scout';
				break;
			case 421:
				$job = 'Bourg';
				break;
			case 422:
				$job = 'Artisan';
				break;
			default:
				$job = 'Untitled';
				break;
		}

		return $job;
	}

	/**
	 * Rank the characters according to provided details
	 *
	 * @param 	integer 	$offset
	 * @param 	string 		$field
	 * @return 	Character
	 */
	public static function byTop($offset = 10, $field = null)
	{
		$characters = new static();
		
		if ( !is_null($field) ) $characters->orderBy($field, 'desc');

		return $characters->take($offset);
	}

	/**
	 * A shortcut to access the name of the character
	 *
	 * @return 	string
	 */
	public function getNameAttribute()
	{
		return $this->txtNAME;
	}

	/**
	 * A shortcut to access the level of the character
	 *
	 * @return 	int
	 */
	public function getLevelAttribute()
	{
		return $this->btLEVEL;
	}

	/**
	 * A shortcut to access the job of the character
	 *
	 * @return 	integer
	 */
	public function getJobAttribute()
	{
		return $this->intJOB;
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
		return $this->belongsTo('User', 'Account', 'txtACCOUNT');
		//$user = User::where('Account', $this->txtACCOUNT)->first();
		
		//return $user;
	}
}