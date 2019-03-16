<?php

use Illuminate\Database\Seeder;
use VoyagerBread\Traits\BreadSeeder;

class PageBreadSeeder extends Seeder
{
    use BreadSeeder;

    public function bread()
    {
        return [
            // usually the name of the table
            'name'                  => 'page',
            'display_name_singular' => 'Page',
            'display_name_plural'   => 'Pages',
            'icon'                  => '',
            'model_name'            => 'App\Page',
            'controller'            => '',
            'generate_permissions'  => 1,
            'description'           => '',
						'details'               => [
							'order_column'    => 'title',
							'order_direction' => 'asc'
						]
        ];
    }

    public function inputFields()
    {
        return [
					// Defaults
            'id' => [
                'type'         => 'number',
                'display_name' => 'ID',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 1,
            ],
            'created_at' => [
                'type'         => 'timestamp',
                'display_name' => 'created_at',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 2,
            ],
            'updated_at' => [
                'type'         => 'timestamp',
                'display_name' => 'updated_at',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 3,
            ],

						// Page rows
						'updated_at' => [
								'type'         => 'timestamp',
								'display_name' => 'updated_at',
								'required'     => 0,
								'browse'       => 0,
								'read'         => 0,
								'edit'         => 0,
								'add'          => 0,
								'delete'       => 0,
								'details'      => '',
								'order'        => 3,
						],
        ];
    }

    public function menuEntry()
    {
        return [
            'role'      => 'admin',
            'title'      => 'Pages',
            'url'        => '',
            'route'      => 'voyager.pages.index',
            'target'     => '_self',
            'icon_class' => 'voyager-file-text',
            'color'      => null,
            'parent_id'  => null,
            'order'      => 1,
        ];
    }
}
