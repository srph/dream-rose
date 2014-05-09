<?php

class Order extends Eloquent {

	/**
	 * Enable soft deletes
	 *
	 * @var boolean
	 */
	protected $softDelete = true;

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
	protected $fillable = array('user_id', 'item_id');

	/**
	 * Checks if the date has already been transacted
	 *
	 * @return 	timestamp|string
	 */
	public function getTransactedAttribute()
	{
		$dateDeleted = $this->deleted_at;

		return ( is_null($dateDeleted) )
			? 'Untransacted'
			: $dateDeleted;
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
	public function item()
	{
		return $this->belongsTo('Item');
	}

}