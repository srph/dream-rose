<?php

// use Illuminate\Auth\UserInterface;
// use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'userinfo';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

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
	protected $fillable = array('email', 'firstname', 'lastname');

	/**
	 * Checks whether the model uses timestamps
	 *
	 * @var boolean
	 */
	public $timestamps = false;

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	// public function getAuthIdentifier()
	// {
	// 	return $this->getKey();
	// }

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	// public function getAuthPassword()
	// {
	// 	return $this->password;
	// }

	/*
	|--------------------------------------------------------------------------
	| ORM
	|--------------------------------------------------------------------------
	*/

	/**
	 * ORM with the Character model
	 *
	 * @return 	Character
	 */
	public function characters()
	{
		return $this->hasMany('Character');
	}

	/**
	 * ORM with the News model
	 *
	 * @return 	News
	 */
	public function news()
	{
		return $this->hasMany('News');
	}

	/**
	 * ORM with the Slide model
	 *
	 * @return 	Slide
	 */
	public function slides()
	{
		return $this->hasMany('Slide');
	}

}