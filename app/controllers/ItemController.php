<?php

class ItemController extends \BaseController {

	/**
	 *
	 * @var Item
	 */ 
	protected $item;

	/**
	 *
	 * @var ItemCategory
	 */
	protected $category;

	/**
	 *
	 * @param 	Item 	$item
	 * @return 	bool
	 */
	public function __construct(Item $item, ItemCategory $category)
	{
		$this->item = $item;
		$this->category = $category;
		$this->beforeFilter('csrf', array('on' => array('post', 'put', 'delete')));
		$this->beforeFilter('gm', array('except' => array('show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if ( ! Input::has('category') ) {
			$items = $this->item
				->orderBy('name', 'asc')
				->paginate(10);
		} else {
			$category = Input::get('category');

			$items = $this->category
				->with('items')
				->where('name', $category)
				->first();

			if( is_null($items) )
				return Redirect::route('admin.item.index');
				
			$items = $items->items()
				->orderBy('name', 'asc')
				->paginate(10);
		}

		$categories = $this->category->all();

		return View::make('pages/item.index')
			->with('items', $items)
			->with('categories', $categories);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = $this->category->all();
		return View::make('pages/item.create')
			->with('categories', $categories);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Grab all input
		$input = Input::all();

		// Validate
		$validation = $this->item->validateForCreation($input);

		if ( $validation->passes() ) {
			$item = $this->item;
			$icon = Input::file('icon');

			$item->name 		= Input::get('name');
			$item->vp_price 	= Input::get('vp');
			$item->dp_price 	= Input::get('dp');
			$item->description 	= Input::get('description');
			$item->icon 		= $this->item->upload($icon);
			$item->hexa 		= Input::get('hexa');

			if  ( $item->save() ) {
				return Redirect::to('item.index')
					->with('item-created-success', '');
			}
		}

		return Redirect::back()
			->withErrors()
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
		$item = $this->item->find($id);

		return View::make('pages/item.edit')
			->with('item', $item);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$item = $this->item->find($id);
		// Grab all input
		$input = Input::all();

		$validation = $this->item->validateForUpdate($input);

		if ( $validation->passes() ) {
			$item->fill($input);

			if( $item->save() ) {
				return Redirect::back()
					->with('item-updated-success', '');
			}
		}

		return Redirect::back()
			->withErrors()
			->withInput();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$item = $this->item->find($id);

		if ( $item->delete() ) return Response::json(array('status' => true));

		return Response::json(array('status' => false));
	}


}
