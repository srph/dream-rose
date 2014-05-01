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
				'name'	=> 'Face'
			),

			array(
				'name'	=> 'Arms'
			),

			array(
				'name'	=> 'Body'
			),

			array(
				'name'	=> 'Foot'
			),

			array(
				'name'	=> 'Cap'
			),

			array(
				'name'	=> 'Wings'
			),

			array(
				'name'	=> 'Accessories'
			),

			array(
				'name'	=> 'Weapon'
			),

			array(
				'name'	=> 'Gem'
			),

			array(
				'name'	=> 'Sub Weapon'
			),

			array(
				'name'	=> 'Pat'
			),

			array(
				'name'	=> 'Use Items'
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
