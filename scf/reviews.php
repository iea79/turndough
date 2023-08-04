<?php
function reviews_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'reviews' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('review-1', 'Review user data');

		$Section->add_group(
			'review-user',
			false,
			array(
				array(
					'name'        => 'review__photo',
					'label'       => 'Photo',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'type'            => 'radio',
					'name'            => 'review__stars',
					'label'           => 'Star rating',
					'choices'         => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
					'check_direction' => 'horizontal',
				),
				array(
					'name'        => 'review__text',
					'label'       => 'Review text',
					'type'        => 'wysiwyg',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'reviews_fields', 10, 5);
