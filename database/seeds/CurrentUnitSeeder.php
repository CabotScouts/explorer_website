<?php

use Illuminate\Database\Seeder;

class CurrentUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("units")->insert([
					'name' => 'Spaniorum',
					'shortname' => 'spaniorum',
					'day' => 0
				]);

				DB::table("units")->insert([
					'name' => 'Concorde',
					'shortname' => 'concorde',
					'day' => 1
				]);

				DB::table("units")->insert([
					'name' => 'Pirates',
					'shortname' => 'pirates',
					'day' => 2
				]);

				DB::table("units")->insert([
					'name' => 'Steama',
					'shortname' => 'steama',
					'day' => 2
				]);

				DB::table("units")->insert([
					'name' => 'Brabazon',
					'shortname' => 'brabazon',
					'day' => 3
				]);

				DB::table("units")->insert([
					'name' => 'Spitfire',
					'shortname' => 'spitfire',
					'day' => 4
				]);

				DB::table("units")->insert([
					'name' => 'Young Leaders',
					'shortname' => 'young-leaders',
					'day' => -1
				]);
    }
}
