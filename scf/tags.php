<?php

function tags_fields($settings, $type, $id, $meta_type, $types)
{
	// var_dump($settings, $type, $id, $meta_type, $types);
	if ($type === "post_tag") {

		$Section = SCF::add_setting('tags-1', 'Tag color');

		$Section->add_group(
			'first-section',
			false,
			array(
				array(
					'type'        => 'colorpicker',
					'name'        => 'tag_color',
					'label'       => 'Select color',
					'default'     => '#EC0187',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'tags_fields', 1, 5);
