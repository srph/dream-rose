<?php

class LinkSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$db = DB::table('vote_links');
		$db->delete();

		$image = 'pdrbiN.gif';

		$data = array(
			array(
				'id'		=> 1,
				'title'		=> 'Xtremetop',
				'image'		=> $image,
				'link'		=> 'http://facebook.com',
			),

			array(
				'id'		=> 2,
				'title'		=> 'Gtop',
				'image'		=> $image,
				'link'		=> 'http://facebook.com',
			),
		);

		$db->insert($data);
	}

}