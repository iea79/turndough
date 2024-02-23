<?php
if (!defined('STORY_PAGE_ID')) {
	$current_page = get_page_by_path('our-story');
	define('STORY_PAGE_ID', $current_page->ID);
}
if (!defined('STORY_TEMPL_NAME')) {
	define('STORY_TEMPL_NAME', 'story-template.php');
}

function story_first_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (STORY_PAGE_ID == $id || get_page_template_slug($id) == STORY_TEMPL_NAME) {

		$Section = SCF::add_setting('story-1', 'First screen');

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
				array(
					'name'        => 'first__img',
					'label'       => 'Section image',
					'type'        => 'image',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'story_first_section_fields', 1, 5);

function story_story_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (STORY_PAGE_ID == $id || get_page_template_slug($id) == STORY_TEMPL_NAME) {

		$Section = SCF::add_setting('story-2', 'Our story');

		$Section->add_group(
			'story-section',
			false,
			array(
				array(
					'name'        => 'story__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'story__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'story__img1',
					'label'       => 'Section image',
					'type'        => 'image',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'story_story_section_fields', 2, 5);

function story_mission_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (STORY_PAGE_ID == $id || get_page_template_slug($id) == STORY_TEMPL_NAME) {

		$Section = SCF::add_setting('story-3', 'Our mission');

		$Section->add_group(
			'mission-section',
			false,
			array(
				array(
					'name'        => 'mission__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'mission__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'mission__img1',
					'label'       => 'Section image',
					'type'        => 'image',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'story_mission_section_fields', 3, 5);

function story_triumph_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (STORY_PAGE_ID == $id || get_page_template_slug($id) == STORY_TEMPL_NAME) {

		$Section = SCF::add_setting('story-4', 'Taste the Triumph');

		$Section->add_group(
			'triumph-section',
			false,
			array(
				array(
					'name'        => 'triumph__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'triumph__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'story_triumph_section_fields', 4, 5);

function story_location_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (STORY_PAGE_ID == $id || get_page_template_slug($id) == STORY_TEMPL_NAME) {

		$Section = SCF::add_setting('story-5', 'Prime Locations');

		$Section->add_group(
			'location-section',
			false,
			array(
				array(
					'name'        => 'location__bg',
					'label'       => 'Section background',
					'type'        => 'image',
					'size'        => 'large',
				),
				array(
					'name'        => 'location__img',
					'label'       => 'Section image',
					'type'        => 'image',
				),
				array(
					'name'        => 'location__text_bg',
					'label'       => 'Section text background',
					'type'        => 'image',
				),
				array(
					'name'        => 'location__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'location__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'story_location_section_fields', 5, 5);

function story_guaranteed_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (STORY_PAGE_ID == $id || get_page_template_slug($id) == STORY_TEMPL_NAME) {

		$Section = SCF::add_setting('story-6', 'Satisfaction Guaranteed');

		$Section->add_group(
			'guaranteed-section',
			false,
			array(
				array(
					'name'        => 'guaranteed__title',
					'label'       => 'Section title',
					'type'        => 'text',
				),
				array(
					'name'        => 'guaranteed__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'guaranteed__link',
					'label'       => 'Section link',
					'type'        => 'text',
				),
				array(
					'name'        => 'guaranteed__img',
					'label'       => 'Section image',
					'type'        => 'image',
				),
				array(
					'name'        => 'guaranteed__video',
					'label'       => 'Section video',
					'type'        => 'file',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'story_guaranteed_section_fields', 6, 5);

function story_reviews_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (STORY_PAGE_ID == $id || get_page_template_slug($id) == STORY_TEMPL_NAME) {

		$Section = SCF::add_setting('story-7', 'Reviews');

		$Section->add_group(
			'reviews-section',
			false,
			array(
				array(
					'type'        => 'relation',
					'name'        => 'review_ids',
					'label'       => 'Reviews',
					'post-type'   => array('reviews'),
					'limit'       => 0,
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'story_reviews_section_fields', 7, 5);

function story_product_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (STORY_PAGE_ID == $id || get_page_template_slug($id) == STORY_TEMPL_NAME) {

		$Section = SCF::add_setting('story-8', 'Product section');

		$Section->add_group(
			'product-section',
			false,
			array(
				array(
					'name'        => 'product__title',
					'label'       => 'Section title',
					'type'        => 'text',
					'default'     => 'Signature Chimney Cakes',
				),
				array(
					'name'        => 'product__text',
					'label'       => 'Section text',
					'type'        => 'wysiwyg',
					'default'     => 'Today, we proudly offer 18 signature Chimney cakes with Soft Serve Gelato, allowing you to indulge in a variety of delectable combinations.',
				),
				array(
					'type'        => 'relation',
					'name'        => 'product__cat',
					'label'       => 'Category',
					'post-type'    => array('products'),
					'limit'       => 0,
				),
				array(
					'name'        => 'product__btn',
					'label'       => 'Section button text',
					'type'        => 'text',
					'default'     => 'See Our Menu',
				),
				array(
					'name'        => 'product__btn_link',
					'label'       => 'Section button link',
					'type'        => 'text',
					'default'     => '/menu/',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'story_product_section_fields', 8, 5);
