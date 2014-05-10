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
		$config 	= Config::get('dream.paths.news');
		$default 	= Config::get('dream.news.sizes');
		$extension 	= $file->getClientOriginalExtension();
		$filename 	= Str::random(8) . '.' . $extension;
		$path 		= public_path() . "/{$config}/{$filename}";
		$width 		= $default['width'];
		$height 	= $default['height'];

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
	 * Get news by provided type
	 *
	 * @param 	string 	$query
	 * @return 	News
	 */
	public static function getByType($query)
	{
		switch( strtolower($query) ) {
			case 'news':
				$type = 1;
				break;

			case 'updates':
				$type = 2;
				break;

			case 'events':
				$type = 3;
				break;

			default:
				return;
		}

		$news = self::whereHas('type', function($query) use ($type)
		{
			$query->where('type_id', '=', $type);
		});

		return $news;
	}


	/**
	 * Returns a summary of the content along with
	 * a mark up
	 *
	 * @return 	string
	 */
	public function getSummaryAttribute()
	{
		$content 	= $this->content;
		$limit 		= 162;

		if( strlen($content) > $limit ) {
			$content = substr($content, 0, 162);
			$summary = sprintf("%s...", $content);

			return $summary;
		}

		return $content;
	}


	/**
	 * Returns a summary of the content along with
	 * a mark up
	 *
	 * @return 	string
	 */
	public function getShorterSummaryAttribute()
	{
		$content 	= $this->content;
		$limit 		= 52;

		return ( strlen($content) > $limit )
			? substr($content, 0, 52) . '...'
			: $content;
	}
	


	/**
	 * Get a formatted string of publish date
	 *
	 * @return 	string
	 */
	public function getDatePublishedAttribute()
	{
		$timestamp 	= strtotime($this->created_at);
		$format 	= date('F d, Y', $timestamp);

		return $format;
	}


	/**
	 * Returns the appropriate URL of the image
	 *
	 * @return 	string
	 */
	public function getImageURL()
	{
		$path = Config::get('dream.paths.news');
		return url("{$path}/{$this->cover}");
	}

	/**
	 * Since lepture editor uses pre, let's replace it. Shall we?
	 *
	 * @return 	string
	 */
	public static function replacePre($content)
	{
		$content = preg_replace('/pre>/g', 'p>', $content);
		return $content;
	}


	/**
	 * Validate input for creation
	 *
	 * @param 	array 	$input
	 * @return 	Validator
	 */
	public static function validForCreation(array $input)
	{
		$rules = array(
			'cover'		=> 'required|mimes:jpg,jpeg,png,gif',
			'title'		=> 'required|between:4,48',
			'content'	=> 'required',
			'type'		=> 'required|in:1,2,3'
		);

		return Validator::make($input, $rules);
	}


	/**
	 * Validate input for update
	 *
	 * @param 	array 	$input
	 * @return 	Validator
	 */
	public static function validForUpdate(array $input)
	{
		$rules = array(
			'title'		=> 'required|between:4,48',
			'content'	=> 'required',
			'type'		=> 'required|in:1,2,3'
		);

		if( $input['cover'] ) $rules['cover'] = 'required|mimes:jpg,jpeg,png,gif';

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

	/**
	 * ORM with the [News Type] table
	 *
	 * @return 	NewsType
	 */
	public function type()
	{
		return $this->belongsTo('NewsType', 'type_id');
	}

}