<?php

class DPSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$db = DB::table('donation_points');
		$db->delete();

		$data = array(
			array(
				'id'			=>	1,
				'user_id'		=>	1,
				'count'			=>	66
			)
		);

		$db->insert($data);
	}

}