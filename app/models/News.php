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
			$content 	= substr($content, 0, 162);
			$link 		= URL::to('news/' . $this->id);
			$markup 	= sprintf("<a href='%s'><strong>Read More</strong></a>", $link);
			$summary 	= sprintf("%s... %s", $content, $markup);

			return $summary;
		}

		return $content;
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