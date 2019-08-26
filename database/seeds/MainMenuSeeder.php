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
      DB::table('menu_items')->insert([
				[
					'menu_id' => $menu,
					'title'   => 'Home',
					'url'     => '/',
					'order'   => 1
				]
			]);
    }
}
