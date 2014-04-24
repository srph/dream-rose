<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTypes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$data = array(
			array(
				'id'	=>	1,
				'name'	=>	'News'
			),

			array(
				'id'	=>	2,
				'name'	=>	'Updates'
			),

			array(
				'id'	=>	3,
				'name'	=>	'Events'
			),
		);

		DB::table('news_types')->insert($data);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('news_types')->truncate();
	}

}
