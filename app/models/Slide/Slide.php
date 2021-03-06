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
	public static function validForCreation($input)
	{
		$rules = array(
			'image'		=>	'required|mimes:png,jpeg,jpg,gif',
			'caption'	=>	'max:60',
			'link'		=>	'url'
		);

		return Validator::make($input, $rules);
	}

	/**
	 * Valide provided input
	 *
	 * @param 	array 		$input
	 * @return 	Validator
	 */
	public static function validForUpdate($input)
	{
		$rules = array(
			'caption'	=>	'max:60',
			'link'		=>	'url'
		);

		if( $input['image'] ) $rules['image'] = 'required|mimes:png,jpeg,jpg,gif';

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
		$config 	= Config::get('dream.paths.slides');
		$default 	= Config::get('dream.slides.sizes');
		$extension 	= $file->getClientOriginalExtension();
		$filename 	= Str::random(8) . '.' . $extension;
		$path 		= public_path() . "/{$config}/{$filename}";
		$width 		= $default['width'];
		$height 	= $default['height'];

		// Pass the provided file to create an instance of Image
		$image = Image::make( $file->getRealPath() );

		// If the image is smaller than the set sizes, resize
		if($image->width < $width || $image->height < $height) {
			$image->resize($default['width'], $default['height'], false, true);
		}

		// If the image is bigger than the set sizes, crop
		if($image->width > $width || $image->height > $height) {
			$image->crop($default['width'], $default['height'], 0, 0);
		}

		$image->save($path);

		return $filename;
	}

	/**
	 * Returns the URL of the image
	 *
	 * @return 	string
	 */
	public function getImageURL()
	{
		$path = Config::get('dream.paths.slides');
		return url("{$path}/{$this->image}");
	}

	/**
	 * Summarizes the caption
	 *
	 * @return 	string
	 */
	public function getSummaryAttribute()
	{
		return ( strlen( $this->caption ) > 52 )
			? substr( $this->caption, 0, 52 ) . '...'
			: $this->caption;
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