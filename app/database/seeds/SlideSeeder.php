<?php

class SlideSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$db = DB::table('slides');
		$db->delete();

		$data = array(
			array(
				'id'		=> 1,
				'user_id'	=> 1,
				'image'		=> 'pdrbiN.gif',
				'link'		=> 'http://facebook.com',
				'caption'	=> 'Lipsum pogi po talaga ako',
				'created_at'=> date('Y-m-d')
			),

			array(
				'id'		=> 2,
				'user_id'	=> 1,
				'link'		=> null,
				'image'		=> 'pdrbiN.gif',
				'caption'	=> null,
				'created_at'=> date('Y-m-d')
			),
		);

		$db->insert($data);
	}

}