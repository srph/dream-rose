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
	protected $table = 'tblgs_clan';

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