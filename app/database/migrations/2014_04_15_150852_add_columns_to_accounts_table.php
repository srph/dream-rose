<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToAccountstable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('seven_ora')->table('userinfo', function(Blueprint $table)
		{
			$table->integer('id')->nullable();
			$table->string('remember_token')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('seven_ora')->table('userinfo', function(Blueprint $table)
		{
			$table->dropColumn('id');
			$table->dropColumn('remember_token');
		});
	}

}
