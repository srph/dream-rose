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
				'name'	=>	'News'
			),

			array(
				'name'	=>	'Updates'
			),

			array(
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
