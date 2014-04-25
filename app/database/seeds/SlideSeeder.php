<?php

use Faker\Factory as Faker;

class SlideSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$db = DB::table('slides');
		$db->delete();

		$faker = Faker::create();

		$image = 'pdrbiN.gif';

		$data = array(
			array(
				'id'		=> 1,
				'user_id'	=> 1,
				'image'		=> $image,
				'link'		=> 'http://facebook.com',
				'caption'	=> 'Lipsum pogi po talaga ako',
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'id'		=> 2,
				'user_id'	=> 1,
				'image'		=> $image,
				'link'		=> '',
				'caption'	=> $faker->paragraph(1),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'id'		=> 3,
				'user_id'	=> 1,
				'image'		=> $image,
				'link'		=> '',
				'caption'	=> $faker->paragraph(1),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'id'		=> 4,
				'user_id'	=> 1,
				'image'		=> $image,
				'link'		=> '',
				'caption'	=> $faker->paragraph(1),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'id'		=> 5,
				'user_id'	=> 1,
				'image'		=> $image,
				'link'		=> '',
				'caption'	=> $faker->paragraph(1),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'id'		=> 6,
				'user_id'	=> 1,
				'image'		=> $image,
				'link'		=> '',
				'caption'	=> $faker->paragraph(6),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'id'		=> 7,
				'user_id'	=> 1,
				'image'		=> $image,
				'link'		=> '',
				'caption'	=> $faker->paragraph(6),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'id'		=> 8,
				'user_id'	=> 1,
				'image'		=> $image,
				'link'		=> '',
				'caption'	=> $faker->paragraph(6),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'id'		=> 9,
				'user_id'	=> 1,
				'image'		=> $image,
				'link'		=> '',
				'caption'	=> $faker->paragraph(3),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'id'		=> 10,
				'user_id'	=> 1,
				'image'		=> $image,
				'link'		=> '',
				'caption'	=> $faker->paragraph(6),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),

			array(
				'id'		=> 11,
				'user_id'	=> 1,
				'image'		=> $image,
				'link'		=> '',
				'caption'	=> $faker->paragraph(6),
				'created_at'=> date('Y-m-d'),
				'updated_at'=> date('Y-m-d')
			),
		);

		$db->insert($data);
	}

}