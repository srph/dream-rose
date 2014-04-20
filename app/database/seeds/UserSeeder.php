<?php

class UserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$db = DB::connection('seven_ora')->table('userinfo');
		$db->delete();

		$pass = Hash::make('pass');

		$data = array(
			array(
				'id'			=>	1,
				'Account'		=>	'test',
				'Email'			=>	'test@test.com',
				'MotherLName'	=>	'test',
				'MD5PassWord'	=>	$pass
			)
		);

		$db->insert($data);
	}

}