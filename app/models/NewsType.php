<?php

class NewsType extends Eloquent {

	/**
	 * Table used by the model
	 *
	 * @var string
	 */
	protected $table = 'news_types';

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
	public function news()
	{
		return $this->hasMany('News', 'type_id');
	}

}