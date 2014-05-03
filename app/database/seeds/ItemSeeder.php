<?php

use Faker\Factory as Faker;

class ItemSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$db = DB::table('items');
		$db->delete();

		$faker = Faker::create();
		$image = 'pdrbiN.gif';

		$data = array(
			array(
				'category_id'	=> 1,
				'name'			=> $faker->sentence(3),
				'description'	=> $faker->paragraph(2),
				'vp_price'		=> 69,
				'dp_price'		=> 0,
				'hexa'			=> '0XFF',
				'icon'			=> $image
			),

			array(
				'category_id'	=> 1,
				'name'			=> $faker->sentence(3),
				'description'	=> $faker->paragraph(2),
				'vp_price'		=> 5,
				'dp_price'		=> 0,
				'hexa'			=> '0XFF',
				'icon'			=> $image
			),

			array(
				'category_id'	=> 2,
				'name'			=> $faker->sentence(3),
				'description'	=> $faker->paragraph(2),
				'vp_price'		=> 0,
				'dp_price'		=> 69,
				'hexa'			=> '0XFF',
				'icon'			=> $image
			),

			array(
				'category_id'	=> 2,
				'name'			=> $faker->sentence(3),
				'description'	=> $faker->paragraph(2),
				'vp_price'		=> 0,
				'dp_price'		=> 5,
				'hexa'			=> '0XFF',
				'icon'			=> $image
			)
		);

		$db->insert($data);
	}

}