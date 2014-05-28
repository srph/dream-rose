<?php

class LauncherController extends BaseController {

	/**
	 * @var News
	 */
	protected $news;

	/**
	 * Create a new instance of this class
	 *
	 * @param 	News 	$news
	 */
	public function __construct(News $news)
	{
		$this->news = $news;
	}

	/**
	 * News for the launcher
	 *
	 * @return 	Response
	 */
	public function getNews()
	{
		$news = $this->news
			->orderBy('id', 'desc')
			->paginate(10);

		return View::make('pages/launcher.news')
			->with('news', $news);
	}

	/**
	 * Return patch note
	 *
	 * @return 	file
	 */
	public function getPatchNote()
	{
		$directory = public_path() . '\\launcher';
		$patchnote = "{$directory}\\patch.txt";

		if( File::exists($patchnote) && File::isFile($patchnote) )
		{
			$file = File::get($patchnote);
			return $file;
		}
	}

	/**
	 * Return patch directory
	 *
	 * @return 	file
	 */
	public function getPatchDir()
	{
		$directory = public_path() . '\\launcher';

		if( File::isDirectory($directory) )
		{
			return File::allFiles($directory);
		}
	}
	
}