<?php

class MallController extends BaseController {

	protected $item;

	protected $category;

	public function __construct(Item $item, ItemCategory $category)
	{
		$this->item = $item;
		$this->category = $category;
	}

	public function getIndex()
	{
		$categories = $this->category->all();

		return View::make('pages/item/mall.index')
			->with('categories', $categories);
	}
	
}