<?php

class News extends Eloquent {

	/**
	 * Table used by the model
	 *
	 * @var string
	 */
	protected $table = 'news';

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
		'cover',
		'title',
		'content'
	);

	/**
	 * Upload the slide image
	 *
	 * @param 	file 	$file
	 * @return 	string
	 */
	public static function upload($file)
	{
		$config = Config::get('dream.paths.news');
		$default = Config::get('dreams.news.sizes');
		$filename = Str::random(8);
		$path = public_path() . "{$config}/{$filename}";

		// Pass the provided file to create an instance of Image
		$image = Image::make( $file->getRealPath() );

		// If the image is either smaller or bigger, simply resize.
		if( ( $image->width < $width || $image->height < $height ) ||
			( $image->width > $width || $image->height > $height) ) {
			$image->resize($default['width'], $default['height']);
		}

		$image->save($path);

		return $filename;
	}

	/**
	 * Returns the appropriate URL of the image
	 *
	 * @return 	string
	 */
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
		return $this->belongsTo('user');
	}
}