<?php
// BREAD for the Explorer Units

use Illuminate\Database\Seeder;
use VoyagerBread\Traits\BreadSeeder;

class UnitsBreadSeeder extends Seeder
{
    use BreadSeeder;

    public function bread()
    {
        return [
            // usually the name of the table
            'name'                  => 'units',
            'slug'                  => 'units',
            'display_name_singular' => 'Unit',
            'display_name_plural'   => 'Units',
            'icon'                  => '',
            'model_name'            => 'App\Models\Unit',
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
            'id' => [
							// Defaults
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
                'display_name' => 'created_at',
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
                'display_name' => 'updated_at',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 0,
            ],
						// Real Fields
						'name' => [
                'type'         => 'text',
                'display_name' => 'Name',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 1,
            ],
						'shortname' => [
                'type'         => 'text',
                'display_name' => 'Short Name',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 2,
            ],
						'day' => [
                'type'         => 'select_dropdown',
                'display_name' => 'Day',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
									'options' => [
										0  => 'Monday',
										1  => 'Tuesday',
										2  => 'Wednesday',
										3  => 'Thursday',
										4  => 'Friday',
										5  => 'Saturday',
										6  => 'Sunday',
										-1 => 'Virtual'
									]
								],
                'order'        => 3,
            ],
						'start_time' => [
								'type'         => 'time',
								'display_name' => 'Start Time',
								'required'     => 0,
								'browse'       => 0,
								'read'         => 1,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 1,
								'details'      => [
								],
								'order'        => 4,
						],
						'end_time' => [
								'type'         => 'time',
								'display_name' => 'End Time',
								'required'     => 0,
								'browse'       => 0,
								'read'         => 1,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 1,
								'details'      => [
								],
								'order'        => 5,
						],
						'coordinates' => [
                'type'         => 'maplocation',
                'display_name' => 'Location',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
									'options' => []
								],
                'order'        => 6,
            ],
						'color' => [
                'type'         => 'color',
                'display_name' => 'Color',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
									'options' => []
								],
                'order'        => 7,
            ],
						'logo' => [
                'type'         => 'media_picker',
                'display_name' => 'Logo',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
								'details'      => [
									'base_path'    => 'units',
									'allowed'      => 'image',
									'delete_files' => false,
									'allow_delete' => true,
									'allow_rename' => true,
									'allow_crop'   => true,
									'allow_move'   => false,
									'max'          => 1,
									'show_folders' => true
									],
                'order'        => 8,
            ],
						'blurb' => [
                'type'         => 'text_area',
                'display_name' => 'Description',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 9,
            ],
						'status' => [
                'type'         => 'select_dropdown',
                'display_name' => 'Status',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
									'options' => [
										1   => 'Visible',
										0   => 'Hidden'
									],
									'on'   => 'Visible',
									'off'  => 'Hidden',
									'checked' => false,
								],
                'order'        => 10,
            ],
        ];
    }

    public function menuEntry()
    {
        return [
            'role'      => 'admin',
            'title'      => 'Units',
            'url'        => '',
            'route'      => 'voyager.units.index',
            'target'     => '_self',
            'icon_class' => 'voyager-world',
            'color'      => null,
            'parent_id'  => null,
            'order'      => 4,
        ];
    }
}
