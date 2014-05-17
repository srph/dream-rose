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
	protected $hidden = array('MD5PassWord', 'password');

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
		$username 	= 'required|alpha_num|between:4,32|unique:userinfo,Account';
		$password 	= 'required|between:4,48';
		$email		= 'required|email|unique:userinfo,Email';
		$mname 		= 'required';
		$activated	= 'in:0,1';
		$vp = $dp = $gm = 'integer';

		// Unique rules
		if(!is_null($id)) {
			$unique  	 = ',' . $id;
			$username 	.= $unique;
			$email		.= $unique;
			$password 	 = '';
		}

		$rules = array(
			'username'	=> $username,
			'password'	=> $password,
			'email'		=> $email,
			'mname'		=> $mname,
			'activated' => $activated,
			'vp'	 	=> $vp,
			'dp' 		=> $dp,
			'gm_lv' 	=> $gm
		);

		$messages = array('mname.required' => "The security question field is required");

		Config::set('database.default', 'seven_ora'); // Set config
		return Validator::make($input, $rules, $messages);
	}

	/**
	 * Change password of the user
	 *
	 * @param 	string 	$old
	 * @param 	string 	$new
	 * @return 	boolean
	 */
	public function changePassword($old, $new)
	{
		if(Hash::check($old, $this->MD5PassWord)) {
			$this->MD5PassWord = Hash::make($new);
			return $this->save();
		}

		return false;
	}

	/**
	 * Checks if the user is a GM
	 *
	 * @return 	boolean
	 */
	public function isGM()
	{
		return ( $this->Right > 1 )
			? true
			: false;
	}

	/**
	 * Add vote points to the user
	 *
	 * @return 	boolean
	 */
	public function addVP($points)
	{
		return $this->votePoint->increment('count', $points);
	}

	/**
	 * Add donation points to the user
	 *
	 * @return 	boolean
	 */
	public function addDP($points)
	{
		return $this->donationPoint->increment('count', $points);
	}

	/**
	 * The number of GMs in the game
	 *
	 * @return 	int
	 */
	public function scopeGM($query)
	{
		return $query->where('Right', '>', 1);
	}

	/**
	 * Since our server files does not use the typical
	 * field names, this sets our username to whatever is being used
	 *
	 * @return 	void
	 */
	public function getUsernameAttribute()
	{
		return $this->Account;
	}

	/**
	 * Since our server files does not use the typical
	 * field names, this sets our password to whatever is being used
	 *
	 * @return 	void
	 */
	public function getPasswordAttribute()
	{
		return $this->MD5PassWord;
	}

	/**
	 * A shortcut to the user's vote point count
	 *
	 * @return 	int
	 */
	public function getVpAttribute()
	{
		return $this->votePoint->count;
	}

	/**
	 * A shortcut to the user's donation point count
	 *
	 * @return 	int
	 */
	public function getDpAttribute()
	{
		return $this->donationPoint->count;
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
		return $this->hasMany('Character', 'txtACCOUNT', 'Account');
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
	 * ROWM with the DonationPointmodel
	 *
	 * @return 	DonationPoint
	 */
	public function donationPoint()
	{
		return $this->hasOne('DonationPoint');
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

	/**
	 * ORM with the VoteLog model
	 *
	 * @return 	VoteLog
	 */
	public function logs()
	{
		return $this->hasMany('VoteLog');
	}

	/**
	 * ORM with the Order model
	 *
	 * @return 	Order
	 */
	public function orders()
	{
		return $this->hasMany('Order');
	}

}