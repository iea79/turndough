<?php
if (!defined('HOME_ID')) {
	$homeId = get_option('page_on_front');
	define('HOME_ID', $homeId);
}

function home_first_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('home-1', 'First section');

		$Section->add_group(
			'first-section',
			false,
			array(
				array(
					'name'        => 'first__bg',
					'label'       => 'Section background',
					'type'        => 'image',
					'size'        => 'large',
				),
			)
		);

		$Section->add_group(
			'first_slider',
			true,
			array(
				array(
					'name'        => 'first__title',
					'label'       => 'Slide title',
					'type'        => 'text',
				),
				array(
					'name'        => 'first__text',
					'label'       => 'Slide text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'first__img',
					'label'       => 'Slide image',
					'type'        => 'image',
					'size'        => 'medium',
				),

			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_first_section_fields', 1, 5);

function home_benefit_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('home-2', 'Benefit section');

		$Section->add_group(
			'benefit-section',
			false,
			array(
				array(
					'name'        => 'benefit__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'benefit__text',
					'label'       => 'Section title',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'benefit__bg',
					'label'       => 'Section image',
					'type'        => 'image',
					'size'        => 'large',
				),
				array(
					'name'        => 'benefit__insta',
					'label'       => 'Section instagram link',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'benefit_list',
			true,
			array(
				array(
					'name'        => 'benefit__list_img',
					'label'       => 'List image',
					'type'        => 'image',
				),
				array(
					'name'        => 'benefit__list_text',
					'label'       => 'List text',
					'type'        => 'wysiwyg',
				),

			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_benefit_section_fields', 2, 5);

function home_product_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('home-3', 'Product section');

		$Section->add_group(
			'product-section',
			false,
			array(
				array(
					'name'        => 'product__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'product__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
				array(
					'type'        => 'taxonomy',
					'name'        => 'product__cat',
					'label'       => 'Category',
					'taxonomy'    => array('product-category'),
					'limit'       => 1,
					'notes'       => 'All products in one category',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_product_section_fields', 3, 5);

function home_besides_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('home-4', 'Delicious delights section');

		$Section->add_group(
			'besides-section',
			false,
			array(
				array(
					'name'        => 'besides__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'besides__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
			)
		);

		$Section->add_group(
			'besides_list',
			true,
			array(
				array(
					'name'        => 'besides__list_title',
					'label'       => 'List title',
					'type'        => 'text',
				),
				array(
					'name'        => 'besides__list_img',
					'label'       => 'List img',
					'type'        => 'image',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_besides_section_fields', 4, 5);

function home_offer_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('home-5', 'Delight section');

		$Section->add_group(
			'offer-section',
			false,
			array(
				array(
					'name'        => 'offer__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'offer__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'offer__img',
					'label'       => 'Section img',
					'type'        => 'image',
					'size'        => 'medium',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_offer_section_fields', 5, 5);

function home_instagram_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('home-6', 'Instagram section');

		$Section->add_group(
			'instagram-section',
			false,
			array(
				array(
					'name'        => 'instagram__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'instagram__link_text',
					'label'       => 'Instagram link text',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'instagram_list',
			true,
			array(
				array(
					'name'        => 'instagram__link',
					'label'       => 'Slide link',
					'type'        => 'text',
				),
				array(
					'name'        => 'instagram__img',
					'label'       => 'Slide img',
					'type'        => 'image',
					'size'        => 'medium',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_instagram_section_fields', 6, 5);
