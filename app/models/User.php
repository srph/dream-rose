<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Base implements UserInterface, RemindableInterface {

	/**
	 * Connection used by the model
	 *
	 * @var string
	 */
	protected $connection = 'seven_ora';

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
	protected $hidden = array('MD5PassWord');

	/**
	 * Fields guarded by the model
	 *
	 * @var array
	 */
	protected $guarded = array();

	/**
	 * Fields fillable by the model
	 *
	 * @var array
	 */
	protected $fillable = array(
		'Account',
		'Email',
		'MD5PassWord',
		'FirstName',
		'LastName',
		'MotherLName'
	);

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
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->MD5PassWord;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Validate input
	 *
	 * @param 	array 		$input
	 * @param 	integer 	$id
	 * @return 	Validator
	 */
	public function validate(array $input = array(), $id = null)
	{
		// Rules
		$username 	= 'required|between:4,32|unique';
		$password 	= 'required|between:4,48';
		$email		= 'required|email|unique';
		$mname 		= 'required';

		// Unique rules
		if(!is_null($id)) {
			$unique  	 = 'userinfo,id,' . $id;
			$username 	.= $unique;
			$email		.= $unique;
		}

		$rules = array(
			'username'	=>	$username,
			'password'	=>	$password,
			'email'		=>	$email,
			'mname'		=>	$mname
		);

		return Validator::make($input, $rules);
	}

	/**
	 * Since our server files does not use the typical
	 * field names, this sets our username to whatever is being used
	 *
	 * @return 	void
	 */
	public function getUsernameAttribute()
	{
		$this->attributes['username'] = $this->Account;
	}

	/**
	 * Since our server files does not use the typical
	 * field names, this sets our password to whatever is being used
	 *
	 * @return 	void
	 */
	public function getPasswordAttribute()
	{
		$this->attributes['password'] = $this->MD5PassWord;
	}


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
	 * ORM with the VotePoint model
	 *
	 * @return 	VotePoint
	 */
	public function votePoint()
	{
		return $this->hasOne('VotePoint');
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