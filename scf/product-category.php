<?php
if (!defined('CAT_TYPE_NAME')) {
	define('CAT_TYPE_NAME', 'product-category');
}

function category_settings_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === CAT_TYPE_NAME && $meta_type = 'term') {

		$Section = SCF::add_setting('category-1', 'Category image');

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
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'category_settings_fields', 10, 5);
