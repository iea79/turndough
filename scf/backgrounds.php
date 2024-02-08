<?php
if (!defined('BACKGROUNDS_TYPE_NAME')) {
	define('BACKGROUNDS_TYPE_NAME', 'our-backgrounds');
}

function backgrounds_part_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type == BACKGROUNDS_TYPE_NAME) {

		$Section = SCF::add_setting('backgrounds_part', 'Edit backgrounds');

		$Section->add_group(
			'backgrounds_part_field',
			false,
			array(
				array(
					'name'        => 'backgrounds__reviews',
					'label'       => 'Reviews background',
					'type'        => 'image',
				),
				// array(
				// 	'name'        => 'backgrounds__lines',
				// 	'label'       => 'Lines background',
				// 	'type'        => 'image',
				// ),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'backgrounds_part_fields', 10, 5);
