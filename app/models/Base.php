<?php

class Base extends Eloquent {

	/**
	 * Checks whether the model uses timestamps
	 *
	 * @var boolean
	 */
	public $timestamps = false;


	/**
	 * Increment the ID
	 *
	 * @return 	int
	 */
	public static function incrementID()
	{
		$last = static::orderBy('id', 'desc')->first();
		return ( !is_null($last) )
			? $last->id + 1
			: 1;
	}

}