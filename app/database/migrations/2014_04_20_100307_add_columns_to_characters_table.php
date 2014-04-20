<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCharactersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('sho')->table('tblgs_avatar', function(Blueprint $table)
		{
			$table->integer('id');
			$table->integer('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('sho')->table('tblgs_avatar', function(Blueprint $table)
		{
			$table->dropColumn('id');
			$table->dropColumn('user_id');
		});
	}

}
