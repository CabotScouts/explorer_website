<?php
// BREAD for the Accident Reports

use Illuminate\Database\Seeder;
use VoyagerBread\Traits\BreadSeeder;

class AccidentReportsBreadSeeder extends Seeder
{
    use BreadSeeder;

    public function bread()
    {
        return [
            // usually the name of the table
            'name'                  => 'accident_reports',
            'display_name_singular' => 'Accident Report',
            'display_name_plural'   => 'Accident Reports',
            'icon'                  => '',
            'model_name'            => 'App\AccidentReport',
            'controller'            => '',
            'generate_permissions'  => 1,
            'description'           => '',
						'details'               => [
								'order_column'    => 'id',
								'order_direction' => 'desc'
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
                'browse'       => 1,
                'read'         => 1,
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
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 1,
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
						'reporter' => [
                'type'         => 'text',
                'display_name' => 'Reported by',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 1,
                'details'      => '',
                'order'        => 2,
            ],
						'ip' => [
                'type'         => 'text',
                'display_name' => 'Reporter IP',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 1,
                'details'      => '',
                'order'        => 3,
            ],
        ];
    }

    public function menuEntry()
    {
        return [
            'role'      => 'admin',
            'title'      => 'Accident Reports',
            'url'        => '',
            'route'      => 'voyager.accident_reports.index',
            'target'     => '_self',
            'icon_class' => 'voyager-receipt',
            'color'      => null,
            'parent_id'  => null,
            'order'      => 5,
        ];
    }
}
