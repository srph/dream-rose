<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillItemCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$data = array(
			array(
				'name'	=> 'face'
			),

			array(
				'name'	=> 'arms'
			),

			array(
				'name'	=> 'body'
			),

			array(
				'name'	=> 'foot'
			),

			array(
				'name'	=> 'cap'
			),

			array(
				'name'	=> 'wings'
			),

			array(
				'name'	=> 'accessories'
			),

			array(
				'name'	=> 'weapon'
			),

			array(
				'name'	=> 'gem'
			),

			array(
				'name'	=> 'sub Weapon'
			),

			array(
				'name'	=> 'pat'
			),

			array(
				'name'	=> 'use items'
			),
		);

		DB::table('item_categories')->insert($data);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('item_categories')->truncate();
	}

}
