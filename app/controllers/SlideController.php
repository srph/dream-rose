<?php

class SlideController extends \BaseController {

	/**
	 *
	 * @var Slide
	 */
	protected $slide;

	/**
	 * Apply filter and inject dependencies
	 *
	 * @param 	Slide 	$slide
	 */
	public function __construct(Slide $slide)
	{
		$this->slide = $slide;
		$this->beforeFilter('csrf', array('on' => array('put', 'post', 'delete')));
		$this->beforeFilter('gm');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$slides = $this->slide
			->orderBy('id', 'desc')
			->paginate(10);

		return View::make('pages/slide.index')
			->with('slides', $slides);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages/slide.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Get all inputs
		$input = Input::all();
		$slide = $this->slide;

		// Validate
		$validation = $slide->validate($input);
		if( $validation->passes() ) {
			$file = Input::file('image');
			$user = Auth::user();

			$slide->image 	= $slide->upload($file);
			$slide->caption = Input::get('caption');
			$slide->link 	= Input::get('link');

			if( $user->slides()->save() ) {
				return Redirect::to('admin/slide')
					->with('slide-store-success', '');
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
		$slide = $this->slide
			->find($id)
			->load('user');

		return View::make('pages/slide.edit')
			->with('slide', $slide);
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
		// Grab all inputs
		$input = Input::all();
		$slide = $this->slide;

		$validation = $slide->validate($input);
		if( 	$validation->passes() ) {
			$slide = $slide->find($id);
			// $slide->image 		= Upload
			$slide->caption 	= Input::get('caption');
			$slide->link 		= Input::get('link');

			if($slide->save()) {
				return Response::json(array('status' => true));
			}
		}

		// Contain errors
		$error = $validation->messages();

		// Store errors to a bag
		$bag = array(
			'image'		=>	$error->first('image'),
			'caption'	=>	$error->first('caption'),
			'link'		=>	$error->first('link')
		);

		return Response::json(array(
			'status'	=>	false,
			'errors'	=>	$bag
		));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$slide = $this->slide->find($id);

		if( $slide->delete() ) {
			Session::flash('slide-deleted-success', '');
			return Response::json(array('status' => true));
		}
		
		return Response::json(array('status' => false));
	}

}