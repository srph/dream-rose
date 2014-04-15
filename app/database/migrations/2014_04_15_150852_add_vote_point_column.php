<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotePointColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('userinfo', function(Blueprint $table)
		{
			$table->integer('id');
			$table->integer('vote_points')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('userinfo', function(Blueprint $table)
		{
			$table->dropColumn('id');
			$table->dropColumn('vote_points');
		});
	}

}
