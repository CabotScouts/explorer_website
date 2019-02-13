<?php

use Illuminate\Database\Seeder;

class MainMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$menu = DB::table('menus')->insertGetID(['name' => 'main']);
      DB::table('menu-items')->insert([
				[
					'menu_id' => $menu,
					'title'   => 'Home',
					'url'     => '/',
					'order'   => 1
				],
				[
					'menu_id' => $menu,
					'title'   => 'Calendar',
					'url'     => '/calendar/',
					'order'   => 2
				],
				[
					'menu_id' => $menu,
					'title'   => 'Units',
					'url'     => '/units/',
					'order'   => 3
				],
				[
					'menu_id' => $menu,
					'title'   => 'Top Awards',
					'url'     => '/awards/',
					'order'   => 4
				],
				[
					'menu_id' => $menu,
					'title'   => 'Join Us',
					'url'     => '/join/',
					'order'   => 5
				],
				[
					'menu_id' => $menu,
					'title'   => 'Volunteer',
					'url'     => '/join/volunteer/',
					'order'   => 6
				]
			]);
    }
}
