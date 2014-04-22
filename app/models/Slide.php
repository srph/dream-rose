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
		'link',
		'image',
		'caption'
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
	public static function validate($input)
	{
		$rules = array(
			'image'		=>	'required|mime:png,jpeg,jpg,gif',
			'caption'	=>	'min:150',
			'link'		=>	'url'
		);

		return Validator::make($input, $rules);
	}

	/**
	 * Upload the slide image
	 *
	 * @param 	file 	$file
	 * @return 	string
	 */
	public static function upload($file)
	{
		$path = Config::get('dream.paths.slides');
		$filename = Str::random(8);

		Image::make( $file->getRealPath() )
			->resize('1150', '180')
			->save("public/{$path}/{$filename}");

		return $filename;
	}

	public function getImageURL()
	{
		$path = Config::get('dream.paths.slides');
		return url("{$path}/{$this->image}");
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