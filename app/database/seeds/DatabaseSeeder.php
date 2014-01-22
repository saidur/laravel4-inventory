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

		 $this->call('UserTableSeeder');
		$this->call('BranchesTableSeeder');
		$this->call('CompaniesTableSeeder');
		$this->call('CategoriesTableSeeder');
	}

}