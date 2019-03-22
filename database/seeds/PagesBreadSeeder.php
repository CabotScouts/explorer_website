<?php

use Illuminate\Database\Seeder;
use VoyagerBread\Traits\BreadSeeder;
use TCG\Voyager\Models\Page;

class PagesBreadSeeder extends Seeder
{
    use BreadSeeder;

    public function bread()
    {
        return [
            // usually the name of the table
            'name'                  => 'pages',
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
						'meta_description' => [
                'type'         => 'text',
                'display_name' => 'Description',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 0,
            ],
						'meta_keywords' => [
                'type'         => 'text',
                'display_name' => 'Keywords',
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
								'read'         => 1,
								'edit'         => 1,
								'add'          => 1,
								'delete'       => 0,
								'details'      => '',
								'order'        => 3,
						],
						'image' => [ // TODO: replace this with media manager option
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
									'allow_delete' => false,
									'allow_rename' => false,
									'allow_crop'   => false,
									'allow_move'   => false,
									'max'          => 1,
									'show_folders' => true
									],
								'order'        => 4,
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
								'order'        => 5,
						]
        ];

				print(Page::STATUS_ACTIVE);
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
