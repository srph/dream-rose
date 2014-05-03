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
				'title'		=> 'Xtremetop',
				'image'		=> $image,
				'link'		=> 'http://facebook.com',
			),

			array(
				'title'		=> 'Gtop',
				'image'		=> $image,
				'link'		=> 'http://facebook.com',
			),
		);

		$db->insert($data);
	}

}