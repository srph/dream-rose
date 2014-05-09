<?php

class Order extends Eloquent {

	/**
	 * Enable soft deletes
	 *
	 * @var boolean
	 */
	protected $softDeletes = true;

	/**
	 * Default connection used by the model
	 *
	 * @var string
	 */
	protected $connection = 'dream';

	/**
	 * Columns fillable by the model
	 *
	 * @var array
	 */
	protected $guarded = array('*');

	/**
	 * Columns fillable by the model
	 *
	 * @var array
	 */
	protected $fillable = array();

	/**
	 * Return all "processed" rows
	 *
	 * @param 	Order 	$query
	 * @return 	Order
	 */
	public function scopeProcessed($query)
	{
		return $query->where('processed', true);
	}

	/*
	|--------------------------------------------------------------------------
	| ORM
	|--------------------------------------------------------------------------
	*/

	/**
	 * ORM with the Item table
	 *
	 * @return 	Item
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * ORM with the Item table
	 *
	 * @return 	Item
	 */
	public function items()
	{
		return $this->belongsTo('Item');
	}

}