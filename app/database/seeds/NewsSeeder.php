<?php

use Faker\Factory as Faker;

class NewsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$db = DB::table('news');
		$db->delete();

		$faker = Faker::create();

		$image = 'pdrbiN.gif';

		$data = array(
			array(
				'user_id'	=> 1,
				'type_id'	=> 1,
				'cover'		=> $image,
				'title'		=> $faker->sentence(4),
				'content'	=> $faker->paragraph(5),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'user_id'	=> 1,
				'type_id'	=> 2,
				'cover'		=> $image,
				'title'		=> $faker->sentence(4),
				'content'	=> $faker->paragraph(5),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'user_id'	=> 1,
				'type_id'	=> 3,
				'cover'		=> $image,
				'title'		=> $faker->sentence(4),
				'content'	=> $faker->paragraph(5),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'user_id'	=> 1,
				'type_id'	=> 1,
				'cover'		=> $image,
				'title'		=> $faker->sentence(2),
				'content'	=> $faker->paragraph(5),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'user_id'	=> 1,
				'type_id'	=> 3,
				'cover'		=> $image,
				'title'		=> $faker->sentence(1),
				'content'	=> $faker->paragraph(5),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'user_id'	=> 1,
				'type_id'	=> 2,
				'cover'		=> $image,
				'title'		=> $faker->sentence(3),
				'content'	=> $faker->paragraph(5),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'user_id'	=> 1,
				'type_id'	=> 2,
				'cover'		=> $image,
				'title'		=> $faker->sentence(3),
				'content'	=> $faker->paragraph(9),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),
		);

		$db->insert($data);
	}

}