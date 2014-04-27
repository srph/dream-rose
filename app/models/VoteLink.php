<?php

class VoteLink extends Eloquent {

	/**
	 * Table used by the model
	 *
	 * @var string
	 */
	protected $table = 'vote_links';

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
	protected $fillable = array('title', 'image', 'link');

	/**
	 * Checks whether the model uses timestamps
	 *
	 * @var boolean
	 */
	public $timestamps = false;


	/**
	 * Validates input for creation
	 *
	 * @param 	array 	$input
	 * @return 	Validator
	 */
	public static function validForCreation(array $input)
	{
		$rules = array(
			'image'	=> 'required|mime:png,jpg,gif',
			'title'	=> 'required',
			'link'	=> 'required|url'
		);

		return Validator::make($input, $rules);
	}


	/**
	 * Validates input for creation
	 *
	 * @param 	array 	$input
	 * @return 	Validator
	 */
	public static function validForUpdate(array $input)
	{
		$rules = array(
			'title'	=> 'required',
			'link'	=> 'required|url'
		);

		if ( $input['image'] ) $rules['image'] = 'required|mime:png,jpg,gif';

		return Validator::make($input, $rules);
	}


	/**
	 * Upload image for the vote link
	 *
	 * @param 	file 	$image
	 * @return 	boolean
	 */
	public static function upload($image)
	{
		$config 	= Config::get('dream.paths.vote');
		$extension 	= $file->getClientOriginalExtension();
		$filename 	= Str::random(8) . '.' . $extension;
		$path 		= public_path() . "/{$config}/{$filename}";

		Image::make( $image->getRealPath() )->save($path);

		return $filename;
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