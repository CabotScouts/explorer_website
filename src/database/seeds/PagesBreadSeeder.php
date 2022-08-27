<?php

use Illuminate\Database\Seeder;
use VoyagerBread\Traits\BreadSeeder;

class PagesBreadSeeder extends Seeder
{
    use BreadSeeder;

    public function bread()
    {
        return [
            // usually the name of the table
            'name'                  => 'pages',
            'slug'                  => 'pages',
            'display_name_singular' => 'Page',
            'display_name_plural'   => 'Pages',
            'icon'                  => '',
            'model_name'            => 'App\Models\Page',
            'controller'            => '',
            'generate_permissions'  => 1,
            'description'           => '',
						'details'               => [
							'order_column'    => 'slug',
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
						'author_id' => [
                'type'         => 'number',
                'display_name' => 'Author',
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
						'excerpt' => [
                'type'         => 'text',
                'display_name' => 'Excerpt',
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
						// TODO: remove unused fields with a migration
						// title, body, image, slug, status
						'title' => [
								'type'         => 'text',
								'display_name' => 'Title',
								'required'     => 1,
								'browse'       => 1,
								'read'         => 1,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 0,
								'details'      => '',
								'order'        => 1,
						],

						'slug' => [
								'type'         => 'text',
								'display_name' => 'Page Address',
								'required'     => 1,
								'browse'       => 1,
								'read'         => 1,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 0,
								'details'      => '',
								'order'        => 2,
						],

						'body' => [
								'type'         => 'rich_text_box',
								'display_name' => 'Content',
								'required'     => 0,
								'browse'       => 0,
								'read'         => 0,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 0,
								'details'      => '',
								'order'        => 3,
						],

						'sidebar' => [
								'type'         => 'code_editor',
								'display_name' => 'Sidebar Content',
								'required'     => 0,
								'browse'       => 0,
								'read'         => 0,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 0,
								'details'      => '',
								'order'        => 4,
						],

						'show_sidebar' => [
								'type'         => 'checkbox',
								'display_name' => 'Show Sidebar',
								'required'     => 1,
								'browse'       => 0,
								'read'         => 1,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 0,
								'details'      => [
									'options' => [
										1 => 'Show Sidebar',
										0 => 'Hide Sidebar'
									],
									'on'   => 'Show Sidebar',
									'off'  => 'Hide Sidebar',
									'checked' => true,
								],
								'order'        => 5,
						],

						'page_belongsto_header_relationship' => [
								'type'         => 'relationship',
								'display_name' => 'Header Image',
								'required'     => 0,
								'browse'       => 0,
								'read'         => 1,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 0,
								'details'      => [
									'model'       => 'App\\Models\\Header',
									'table'       => 'headers',
									'type'        => 'belongsTo',
									'column'      => 'header_id',
									'key'         => 'id',
									'label'       => 'name',
									'pivot_table' => 'data_rows',
									'pivot'       => '0',
									'taggable'    => '0'
								],
								'order'        => 6,
						],

						'header_id' => [
								'type'         => 'text',
								'display_name' => 'Header Image',
								'required'     => 0,
								'browse'       => 0,
								'read'         => 1,
								'edit'         => 1,
								'add'          => 0,
								'delete'       => 0,
								'details'      => '',
								'order'        => 0
						],

						'status' => [
								'type'         => 'checkbox',
								'display_name' => 'Published',
								'required'     => 1,
								'browse'       => 1,
								'read'         => 1,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 0,
								'details'      => [
									'options' => [
										1   => 'Published',
										0 => 'Hidden'
									],
									'on'   => 'Published',
									'off'  => 'Hidden',
									'checked' => false,
								],
								'order'        => 7,
						],

						'meta_description' => [
								'type'         => 'text',
								'display_name' => 'Description',
								'required'     => 0,
								'browse'       => 0,
								'read'         => 1,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 0,
								'details'      => '',
								'order'        => 8,
						],
						'meta_keywords' => [
								'type'         => 'text',
								'display_name' => 'Keywords',
								'required'     => 0,
								'browse'       => 0,
								'read'         => 1,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 0,
								'details'      => '',
								'order'        => 9,
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
            'order'      => 2,
        ];
    }
}
