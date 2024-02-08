<?php
if (!defined('CAT_TYPE_NAME')) {
	define('CAT_TYPE_NAME', 'product-category');
}

function category_settings_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === CAT_TYPE_NAME && $meta_type = 'term') {

		$Section = SCF::add_setting('category-1', 'Category settings');

		$Section->add_group(
			'category-section',
			false,
			array(
				array(
					'name'        => 'cat_img',
					'label'       => 'Image',
					'type'        => 'image',
					'size'        => 'thumbnail',
				),
				array(
					'name'        => 'cat_bg',
					'label'       => 'Background',
					'type'        => 'image',
					'size'        => 'large',
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'cat_color',
					'label'       => 'Main color',
					'notes'       => 'Color from category elements',
				),
				array(
					'name'        => 'cat_descr_title',
					'label'       => 'Category description title',
					'type'        => 'text',
				),
				array(
					'name'        => 'cat_descr',
					'label'       => 'Category description from category page',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'cat_page_bg',
					'label'       => 'Category background from category page',
					'type'        => 'image',
					'size'        => 'large',
				),
				array(
					'type'            => 'check',
					'name'            => 'cat_page_contrast',
					'label'           => 'Text color from category page',
					'choices'         => array(
						'dark' => 'Contrast text',
					),
					'check_direction' => 'horizontal',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'category_settings_fields', 10, 5);
