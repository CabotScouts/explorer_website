<?php

use Illuminate\Database\Seeder;
use VoyagerBread\Traits\BreadSeeder;

class HeadersBreadSeeder extends Seeder
{
    use BreadSeeder;

    public function bread()
    {
        return [
            // usually the name of the table
            'name'                  => 'headers',
            'slug'                  => 'headers',
            'display_name_singular' => 'Headers',
            'display_name_plural'   => 'Headers',
            'icon'                  => '',
            'model_name'            => 'App\Models\Header',
            'controller'            => '',
            'generate_permissions'  => 1,
            'description'           => '',
						'details'               => [
							'order_column'    => 'name',
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
                'order'        => 0,
            ],

            'created_at' => [
                'type'         => 'timestamp',
                'display_name' => 'Created',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 0,
            ],

            'updated_at' => [
                'type'         => 'timestamp',
                'display_name' => 'Updated',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 0,
            ],

						// Real Fields
						// TODO: remove unused fields with a migration
						// title, body, image, slug, status
						'name' => [
								'type'         => 'text',
								'display_name' => 'Name',
								'required'     => 1,
								'browse'       => 1,
								'read'         => 1,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 0,
								'details'      => '',
								'order'        => 1,
						],

						'aria-description' => [
                'type'         => 'text',
                'display_name' => 'Screen Reader Description',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'details'      => '',
                'order'        => 2,
            ],

						'src' => [
								'type'         => 'media_picker',
								'display_name' => 'Header Image',
								'required'     => 0,
								'browse'       => 0,
								'read'         => 1,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 0,
								'details'      => [
									'base_path'    => 'headers',
									'allowed'      => 'image',
									'delete_files' => false,
									'allow_delete' => true,
									'allow_rename' => true,
									'allow_crop'   => true,
									'allow_move'   => false,
									'max'          => 1,
									'show_folders' => true
									],
								'order'        => 3,
						],

						'position' => [
                'type'         => 'select_dropdown',
                'display_name' => 'Header Position',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
									'options' => [
										'left top'      => 'Top Left',
										'left center'   => 'Center Left',
										'left bottom'   => 'Bottom Left',
										'right top'     => 'Top Right',
										'right center'  => 'Center Right',
										'right bottom'  => 'Bottom Right',
										'center top'    => 'Top Center',
										'center center' => 'Centered',
										'center bottom' => 'Bottom Center'
									]
								],
                'order'        => 4,
            ]
        ];
    }

    public function menuEntry()
    {
        return [
            'role'      => 'admin',
            'title'      => 'Page Headers',
            'url'        => '',
            'route'      => 'voyager.headers.index',
            'target'     => '_self',
            'icon_class' => 'voyager-polaroid',
            'color'      => null,
            'parent_id'  => null,
            'order'      => 3,
        ];
    }
}
