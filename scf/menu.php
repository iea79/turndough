<?php
function menu_first_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (239 == $id) {

		$Section = SCF::add_setting('menu-1', 'Categories');

		$Section->add_group(
			'menu-section',
			false,
			array(
				array(
					'type'        => 'taxonomy',
					'name'        => 'menu_cat',
					'label'       => 'Menu categories',
					'taxonomy'    => array('product-category'),
					'limit'       => 0,
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'menu_first_section_fields', 1, 5);
