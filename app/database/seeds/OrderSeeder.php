<?php

use Faker\Factory as Faker;

class OrderSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$db = DB::table('orders');
		$db->delete();

		$faker = Faker::create();

		$data = array(
			array(
				'id'			=> 1,
				'user_id'		=> 1,
				'item_id'		=> 1,
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			),

			array(
				'id'			=> 2,
				'user_id'		=> 1,
				'item_id'		=> 1,
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			),

			array(
				'id'			=> 3,
				'user_id'		=> 1,
				'item_id'		=> 1,
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			),

			array(
				'id'			=> 4,
				'user_id'		=> 1,
				'item_id'		=> 4,
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			),

			array(
				'id'			=> 5,
				'user_id'		=> 1,
				'item_id'		=> 3,
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			),

			array(
				'id'			=> 6,
				'user_id'		=> 1,
				'item_id'		=> 2,
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			),

			array(
				'id'			=> 7,
				'user_id'		=> 2,
				'item_id'		=> 1,
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			),

			array(
				'id'			=> 8,
				'user_id'		=> 2,
				'item_id'		=> 1,
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			),

			array(
				'id'			=> 9,
				'user_id'		=> 2,
				'item_id'		=> 1,
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			),

			array(
				'id'			=> 10,
				'user_id'		=> 2,
				'item_id'		=> 1,
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			),

			array(
				'id'			=> 11,
				'user_id'		=> 2,
				'item_id'		=> 1,
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			),

			array(
				'id'			=> 12,
				'user_id'		=> 2,
				'item_id'		=> 1,
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			),

			array(
				'id'			=> 13,
				'user_id'		=> 2,
				'item_id'		=> 1,
				'deleted_at' 	=> date('Y-m-d'),
				'created_at'	=> date('Y-m-d'),
				'updated_at'	=> date('Y-m-d')
			),
		);

		$db->insert($data);
	}

}