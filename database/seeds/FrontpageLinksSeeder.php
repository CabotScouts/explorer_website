<?php
use Illuminate\Database\Seeder;

class FrontpageLinksSeeder extends Seeder {
	public function run() {
		$menu = DB::table('menus')->insertGetID(['name' => 'frontpage-explorers']);
		DB::table('menu_items')->insert([
			[
				'menu_id' => $menu,
				'title'   => 'Top Awards',
				'url'     => '/awards/',
				'order'   => 1
			],
			[
				'menu_id' => $menu,
				'title'   => 'Young Leaders',
				'url'     => '/units/young-leaders/',
				'order'   => 2
			],
			[
				'menu_id' => $menu,
				'title'   => 'Duke of Edinburgh',
				'url'     => '/duke-of-edinburgh/',
				'order'   => 3
			],
			[
				'menu_id' => $menu,
				'title'   => 'Ten Tors',
				'url'     => '/ten-tors/',
				'order'   => 4
			],
			[
				'menu_id' => $menu,
				'title'   => 'Namaste Nepal',
				'url'     => '/namaste-nepal/',
				'order'   => 5
			],
			[
				'menu_id' => $menu,
				'title'   => 'Gromit (Scout Network)',
				'url'     => '/gromit/',
				'order'   => 6
			]
		]);

		$menu = DB::table('menus')->insertGetID(['name' => 'frontpage-parents']);
		DB::table('menu_items')->insert([
			[
				'menu_id' => $menu,
				'title'   => 'Online Scout Manager - Parent Portal',
				'url'     => 'https://www.onlinescoutmanager.co.uk/login.php',
				'target'  => '_blank',
				'order'   => 1
			],
			[
				'menu_id' => $menu,
				'title'   => 'Parent\'s Guide To Explorers',
				'url'     => '/parents/guide/',
				'target'  => '_self',
				'order'   => 2
			],
			[
				'menu_id' => $menu,
				'title'   => 'Parents\' Committee',
				'url'     => '/parents/committee/',
				'target'  => '_self',
				'order'   => 3
			],
			[
				'menu_id' => $menu,
				'title'   => 'Contact Us',
				'url'     => '/contact-us/',
				'target'  => '_self',
				'order'   => 4
			],
			[
				'menu_id' => $menu,
				'title'   => 'Cabot Scout District',
				'url'     => 'https://bristolcabotscouts.org.uk',
				'target'  => '_blank',
				'order'   => 5
			],
			[
				'menu_id' => $menu,
				'title'   => 'The Scouts',
				'url'     => 'https://scouts.org.uk',
				'target'  => '_blank',
				'order'   => 6
			]
		]);

		$menu = DB::table('menus')->insertGetID(['name' => 'frontpage-leaders']);
		DB::table('menu_items')->insert([
			[
				'menu_id' => $menu,
				'title'   => 'Online Scout Manager',
				'url'     => 'https://www.onlinescoutmanager.co.uk/login.php',
				'target'  => '_blank',
				'order'   => 1
			],
			[
				'menu_id' => $menu,
				'title'   => 'Email Login',
				'url'     => 'https://mail.cabotexplorers.org.uk',
				'target'  => '_blank',
				'order'   => 2
			],
			[
				'menu_id' => $menu,
				'title'   => 'Knowledge Base',
				'url'     => '/leaders/',
				'target'  => '_self',
				'order'   => 3
			],
			[
				'menu_id' => $menu,
				'title'   => 'Google Drive',
				'url'     => 'https://drive.cabotexplorers.org.uk',
				'target'  => '_blank',
				'order'   => 4
			],
			[
				'menu_id' => $menu,
				'title'   => 'Post-14 Meetings',
				'url'     => '/leaders/meetings/',
				'target'  => '_self',
				'order'   => 5
			],
			[
				'menu_id' => $menu,
				'title'   => 'Activity Notifications',
				'url'     => '/leaders/notifications/',
				'target'  => '_self',
				'order'   => 6
			]
		]);
  }
}
