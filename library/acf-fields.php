<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_alternate-homepage-image',
		'title' => 'Alternate Images (optional)',
		'fields' => array (
			array (
				'key' => 'field_53bc02aa5ee5c',
				'label' => 'Square Version of Featured Image',
				'name' => 'square_featured_image',
				'instructions' => 'This should be 391px wide by 391px tall',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_53a0f95f8e6c2',
				'label' => 'Alternate Image for Homepage',
				'name' => 'alternate_homepage_image',
				'instructions' => 'This, like the featured image, should be 808px wide by 455px tall',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_author-fields',
		'title' => 'Author Fields',
		'fields' => array (
			array (
				'key' => 'field_539f7aa96fba7',
				'label' => 'Long Bio',
				'name' => 'long_bio',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_539f7ac46fba8',
				'label' => 'Headshot',
				'name' => 'headshot',
				'type' => 'image',
				'instructions' => 'This should be 93px squared',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_539f9463be7ba',
				'label' => 'Position',
				'name' => 'position',
				'type' => 'text',
				'default_value' => 'Staff Writer',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_user',
					'operator' => '==',
					'value' => 'all',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_format-list-fields',
		'title' => 'Format List Fields',
		'fields' => array (
			array (
				'key' => 'field_53b516c6091ad',
				'label' => 'Format Type',
				'name' => 'format',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-format-list.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'author',
				7 => 'format',
				8 => 'featured_image',
				9 => 'categories',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_post-fields',
		'title' => 'Post Fields',
		'fields' => array (
			array (
				'key' => 'field_53a0f88256a3f',
				'label' => 'Alternate Title (for A/B testing)',
				'name' => 'alternate_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53a0f89e56a40',
				'label' => 'Dek',
				'name' => 'dek',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_video-post-fields',
		'title' => 'Video Post Fields',
		'fields' => array (
			array (
				'key' => 'field_53aa2bcf73aa4',
				'label' => 'Video Embed Code',
				'name' => 'video_embed_code',
				'type' => 'textarea',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 4,
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'video',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_list-post-fields',
		'title' => 'List Post Fields',
		'fields' => array (
			array (
				'key' => 'field_53bd4458f8992',
				'label' => 'List Number Order',
				'name' => 'list_number_order',
				'type' => 'radio',
				'choices' => array (
					'increasing' => 'Increasing',
					'decreasing' => 'Decreasing',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'increasing',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_53aacfbb928f6',
				'label' => 'List Items',
				'name' => 'list_items',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_53aad13dbc3df',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_53aad1c01bde9',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'smaller-square',
						'library' => 'all',
					),
					array (
						'key' => 'field_53aacfe7928f7',
						'label' => 'Content',
						'name' => 'content',
						'type' => 'wysiwyg',
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'full',
						'media_upload' => 'yes',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add List Item',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'aside',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 1,
	));
	register_field_group(array (
		'id' => 'acf_podcast-post-fields',
		'title' => 'Podcast Post Fields',
		'fields' => array (
			array (
				'key' => 'field_53ab7057447f4',
				'label' => 'Podcast MP3 File',
				'name' => 'podcast',
				'type' => 'file',
				'save_format' => 'object',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'audio',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
}

?>