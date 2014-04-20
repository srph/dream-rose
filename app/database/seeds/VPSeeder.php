<?php

class VPSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$db = DB::table('vote_points');
		$db->delete();

		$data = array(
			array(
				'id'			=>	1,
				'user_id'		=>	1,
				'count'			=>	39
			)
		);

		$db->insert($data);
	}

}