<?php

use Illuminate\Database\Seeder;

class MenuLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			// Main Menu (set = navbar)
			DB::table("links")->insert([
				'set'   => 'navbar',
				'name'  => 'Home',
				'url'   => '/',
				'order' => 1
			]);

			DB::table("links")->insert([
				'set'   => 'navbar',
				'name'  => 'Calendar',
				'url'   => '/calendar/',
				'order' => 2
			]);

			DB::table("links")->insert([
				'set'   => 'navbar',
				'name'  => 'Units',
				'url'   => '/units/',
				'order' => 3
			]);

			DB::table("links")->insert([
				'set'   => 'navbar',
				'name'  => 'Top Awards',
				'url'   => '/awards/',
				'order' => 4
			]);

			DB::table("links")->insert([
				'set'   => 'navbar',
				'name'  => 'Joining',
				'url'   => '/join/',
				'order' => 5
			]);

			DB::table("links")->insert([
				'set'   => 'navbar',
				'name'  => 'Volunteer',
				'url'   => '/join/adults/',
				'order' => 6
			]);
    }
}
