<?php

use Dream\Exceptions\PaymentGatewayInvalidException;
use Dream\Exceptions\PointsInsufficientException;

class Item extends Eloquent {

	/**
	 * Table used by the model
	 *
	 * @var string
	 */
	protected $table = 'items';

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
		'name',
		'description',
		'dp_price',
		'vp_price',
		'hexa',
		'icon'
	);

	/**
	 * Checks if the model uses timestamps
	 * 
	 * @var boolean
	 */
	public $timestamps = true;

	/**
	 * Validates input for creation
	 *
	 * @param 	array 	$input
	 * @return 	Validator
	 */
	public function validForCreation(array $input)
	{
		$rules = array(
			'name' 		=> 'required',
			'dp_price'	=> 'integer',
			'vp_price' 	=> 'integer',
			'hexa' 		=> 'required',
			'icon'		=> 'image'
		);

		return Validator::make($input, $rules);
	}

	/**
	 * Upload the item's icon
	 *
	 * @param 	file 	$file
	 * @return 	string|void
	 */
	public function upload($file)
	{
		// Config
		$config 	= Config::get('paths.item');

		// File name
		$random 	= Str::random(6);
		$extension 	= $file->getClientOriginalExtension();
		$filename 	= "{$random}.{$extension}";
		$path 		= public_path() . '/{$config}/{$filename}';

		Image::make( $file->getRealPath() )->save($path);

		return $filename;
	}

	/**
	 * Buy an item with the provided user's vote points
	 *
	 * @param 	User 	$user
	 * @return 	boolean
	 */
	public function buyWithVP(User $user)
	{
		$vp 		= $user->votePoints;
		$current 	= $vp->count;
		$deduction 	= $this->vp_price;
		$deducted 	= $current - $deduction;

		// If the price is set to zero, throw an exception
		if ( $deduction == 0 ) throw new PaymentGatewayInvalidException;

		// Check if the user has sufficient points to buy the item
		if ( $current > $deduction ) throw new PointsInsufficientException;

		// Update the user's points
		$vp->count = $deducted;
		if ( $vp->save() ) return true;		

		return false;
	}

	/**
	 * Buy an item with the provided user's donation points
	 *
	 * @param 	User 	$user
	 * @return 	boolean
	 */
	public function buyWithDP(User $user)
	{
		$dp 		= $user->donationPoints;
		$current 	= $dp->count;
		$deduction 	= $this->dp_price;
		$deducted 	= $current - $deduction;

		// If the price is set to zero, throw an exception
		if ( $deduction == 0 ) throw new PaymentGatewayInvalidException;

		// Check if the user has sufficient points to buy the item
		if ( $current > $deduction ) throw new PointsInsufficientException;

		$dp->count = $deducted;
		if ( $dp->save() ) return true;			

		return false;
	}

	/**
	 * Send the item to the user's storage
	 *
	 * @param 	User 	$user
	 * @return 	boolean 
	 */
	public function sendToStorage(User $user)
	{
		//
	}

}