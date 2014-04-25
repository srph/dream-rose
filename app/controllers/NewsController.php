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
		$this->beforeFilter('csrf', array('on' => array('post', 'put')));
		$this->beforeFilter('gm', array('except' => array('show')));
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

		$validation = $this->news->validate($input);
		if( $validation->passes() ) {

			$news = $this->news;
			$news->title 	= Input::get('title');
			$news->cover 	= Input::file('cover');
			$news->content 	= Input::get('content');

			if( $news->save() ) {
				$url = 'admin/news';
				$session = 'news-store-success';
				return Redirect::to($url)->with($session, '');
			}

		}

		return Redirect::back()
			->withErrors($validation)
			->withInput();
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
		// Refactor
		$input = Input::all();
		$news = $this->news->find($id);

		$validation = $this->news->validate($input);
		if( $validation->passes() ) {
			$this->validation->update($input);
		}
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