<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vote_logs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('vote_link_id');
			$table->integer('user_id');
			$table->timestamps();
			$table->string('ip');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vote_logs');
	}

}
