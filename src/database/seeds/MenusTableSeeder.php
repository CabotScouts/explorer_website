<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        Menu::firstOrCreate([
            'name' => 'admin',
        ]);
        
        Menu::firstOrCreate([
            'name' => 'for-explorers',
        ]);
        
        Menu::firstOrCreate([
            'name' => 'for-parents',
        ]);
        
        Menu::firstOrCreate([
            'name' => 'for-leaders',
        ]);
    }
}
