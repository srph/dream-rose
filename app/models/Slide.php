<?php

class Slide extends Eloquent {

	/**
	 * Table used by the model
	 *
	 * @var string
	 */
	protected $table = 'slides';

	/**
	 * Fields guarded by the model
	 *
	 * @var array
	 */
	protected $guarded = array('id');

	/**
	 * Fields fillable by the model
	 *
	 * @var array
	 */
	protected $fillable = array(
		'user_id',
		'title',
		'cover',
		'content'
	);

	/**
	 * Checks whether the model uses timestamps
	 *
	 * @var boolean
	 */
	public $timestamps = true;

	/**
	 * Valide provided input
	 *
	 * @param 	array 		$input
	 * @return 	Validator
	 */
	public function validate($input)
	{
		$rules = array(
			'image'		=>	'required|mime:png,jpeg,jpg,gif',
			'caption'	=>	'min:150',
			'link'		=>	'url'
		);

		return Validator::make($input, $rules);
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
		return $this->belongsTo('User');
	}
}