<?php

class Clan extends Base {

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
	protected $table = 'tblws_clan';

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

	/**
	 * Rank the characters according to provided details
	 *
	 * @param 	integer 	$offset
	 * @param 	string 		$field
	 * @return 	Character
	 */
	public function byTop($offset = 10, $field = null)
	{
		$characters = new static();

		if ( !is_null($field) ) $characters->orderBy($field, 'desc');

		return $characters->take($offset);
	}

	public function getNameAttribute()
	{
		return $this->txtNAME;
	}

	public function getLevelAttribute()
	{
		return $this->intLEVEL;
	}

	public function getPointsAttribute()
	{
		return $this->intPOINT;
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