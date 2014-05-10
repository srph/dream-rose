<?php

class NewsController extends \BaseController {

	/**
	 *
	 * @var News
	 */
	protected $news;


	/**
	 * Apply filter and inject dependencies
	 *
	 * @param 	News 	$news
	 */
	public function __construct(News $news)
	{
		$this->news = $news;

		// Filters
		$this->beforeFilter('auth');
		$this->beforeFilter('gm');
		$this->beforeFilter('csrf', array('on' => array('post', 'put', 'delete')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$news = $this->news
			->with('user')
			->orderBy('id', 'desc')
			->paginate(10);

		return View::make('pages/news.index')
			->with('news', $news);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages/news.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validation = $this->news->validForCreation($input);
		if( $validation->passes() ) {
			$user 	= Auth::user();
			$image	= Input::file('cover');

			$news 			= $this->news;
			$news->title 	= Input::get('title');
			$news->cover 	= $this->news->upload($image);
			$news->content 	= Input::get('content');
			$news->type_id 	= Input::get('type');

			if( $user->news()->save($news) ) {
				$url = 'admin/news';
				$session = 'news-store-success';
				return Redirect::to($url)->with($session, '');
			}

		}

		return Redirect::to('admin/news/create')
			->withInput()
			->withErrors($validation);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$news = $this->news->find($id);

		return View::make('pages/news.edit')->with('news', $news);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$news 	= $this->news->find($id);
		$input 	= Input::all();

		$validation = $this->news->validForUpdate($input);
		if( $validation->passes() ) {
			$user 	= Auth::user();

			$news->title 	= Input::get('title');
			if( Input::hasFile('cover') ) {
				$image			= Input::file('cover');
				$news->cover 	= $this->news->upload($image);
			}
			$news->content 	= Input::get('content');
			$news->type_id 	= Input::get('type');

			if( $news->save() ) {
				return Redirect::back()->with('news-updated-success', '');
			}

		}

		return Redirect::back()
			->withInput()
			->withErrors($validation);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$news = $this->news->find($id);
		
		if( $news->delete() ) {
			Session::flash('news-deleted-success', '');
			return Response::json(array('status' => true));
		}

		Session::flash('news-deleted-error', '');
		return Response::json(array('status' => false));
	}

}