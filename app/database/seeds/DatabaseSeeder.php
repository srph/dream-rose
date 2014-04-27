<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserSeeder');
		$this->call('VPSeeder');
		$this->call('SlideSeeder');
		$this->call('NewsSeeder');
		$this->call('LinkSeeder');
	}

}