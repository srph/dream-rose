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
		$last = self::orderBy('id', 'desc')->first();
		return $last->id + 1;
	}

}