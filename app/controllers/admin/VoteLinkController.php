<?php

class VoteLinkController extends \BaseController {

	/**
	 *
	 * @var VoteLink
	 */
	protected $vote;


	/**
	 *
	 * @param 	Vote 	$vote
	 */
	public function __construct(VoteLink $vote)
	{
		$this->vote = $vote;
		$this->beforeFilter('csrf', array('on' => 'post', 'put', 'delete'));
		$this->beforeFilter('gm');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$links = $this->vote
			->orderBy('id', 'desc')
			->paginate(10);

		return View::make('pages/vote.index')
			->with('links', $links);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages/vote.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Grab input
		$input = Input::all();

		$validation = $this->vote->validForCreation($input);
		if( $validation->passes() ) {
			$file = Input::file('image');
			$vote = $this->vote;
			$vote->image 	= $this->vote->upload($file);
			$vote->link 	= Input::get('link');
			$vote->title 	= Input::get('title');

			if( $vote->save() ) {
				return Redirect::to('admin/vote-links')
					->with('vote-link-created-success', '');
			}
		}

		return Redirect::back()
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
		$vote = $this->vote->find($id);

		if( empty($id) || count($id) <= 0 ) {
			return Redirect::to('admin/vote-links')
				->with('vote-link-nonexistent', '');
		}

		return View::make('pages/vote.edit')
			->with('vote', $vote);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$vote = $this->vote->find($id);

		if( empty($vote) || count($vote) <= 0 ) {
			return Redirect::to('admin/vote-links')
				->with('vote-link-nonexistent', '');
		}

		// Grab input
		$input = Input::all();

		// Validate
		$validation = $this->vote->validForUpdate($input);

		if( $validation->passes() ) {
			
			if( Input::hasFile('image') ) {
				$file = Input::file('image');
				$vote->image = $this->vote->upload($file);
			}

			$vote->title 	= Input::get('title');
			$vote->link 	= Input::get('link');

			if( $vote->save() ) {
				return Redirect::back()
					->with('vote-link-updated-success', '');
			}
		}

		return Redirect::back()
			->with('vote-link-updated-error', '');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$vote = $this->vote->find($id);

		if( empty($vote) || count($vote) <= 0 ) {
			return Redirect::to('admin/vote-links')
				->with('vote-link-nonexistent', '');
		}

		if( $vote->delete() ) {
			Session::flash('vote-link-delete-success', '');
			return Response::json(array('status' => true));
		}

		Session::flash('vote-link-delete-error', '');
		return Response::json(array('status' => false));
	}


}
