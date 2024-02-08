<?php
function product_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'products' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('product-1', 'Product setting');

		$Section->add_group(
			'products_first',
			false,
			array(
				array(
					'name'        => 'product__photo',
					'label'       => 'Photo',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'product__text',
					'label'       => 'Product description',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'product__ingredients',
					'label'       => 'Product ingredients list',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'product__cat_img',
					'label'       => 'Category page image',
					'type'        => 'image',
					'size'        => 'medium',
				),

			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'product_fields', 1, 5);

function product_first_section($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'products' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('product-2', 'First section');

		$Section->add_group(
			'products_first_section',
			false,
			array(
				array(
					'name'        => 'first_bg',
					'label'       => 'Section background',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'first_video',
					'label'       => 'Section background video',
					'type'        => 'file',
				),
				array(
					'name'        => 'first_btn_icon',
					'label'       => 'First button icon',
					'type'        => 'image',
					'size'        => 'thumbnail',
				),
				array(
					'name'        => 'first_btn',
					'label'       => 'First button text',
					'type'        => 'text',
				),
				array(
					'name'        => 'first_btn_link',
					'label'       => 'First button link',
					'type'        => 'text',
				),
				array(
					'name'        => 'second_btn_icon',
					'label'       => 'Second button icon',
					'type'        => 'image',
					'size'        => 'thumbnail',
				),
				array(
					'name'        => 'second_btn',
					'label'       => 'Second button text',
					'type'        => 'text',
				),
				array(
					'name'        => 'second_btn_link',
					'label'       => 'Second button link',
					'type'        => 'text',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'product_first_section', 2, 5);

function product_ingredients_section($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'products' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('product-3', 'Ingredients section');

		$Section->add_group(
			'products_ingr_section',
			false,
			array(
				array(
					'name'        => 'ingr_bg',
					'label'       => 'Section background',
					'type'        => 'image',
				),
			)
		);

		$Section->add_group(
			'products_ingr_list',
			true,
			array(
				array(
					'name'        => 'ingr_img',
					'label'       => 'Ingredient image',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'ingr_title',
					'label'       => 'Ingredient titile',
					'type'        => 'text',
				),
				array(
					'name'        => 'ingr_name',
					'label'       => 'Ingredient name',
					'type'        => 'text',
				),
				array(
					'name'        => 'ingr_description',
					'label'       => 'Ingredient text',
					'type'        => 'wysiwyg',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'product_ingredients_section', 3, 5);

function product_approach_section($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'products' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('product-4', 'Approach section');

		$Section->add_group(
			'products_approach_section',
			false,
			array(
				array(
					'name'        => 'approach_title',
					'label'       => 'Section name',
					'type'        => 'text',
				),
				array(
					'name'        => 'approach_bg',
					'label'       => 'Section background',
					'type'        => 'image',
				),
			)
		);

		$Section->add_group(
			'products_approach_list',
			true,
			array(
				array(
					'name'        => 'approach_name',
					'label'       => 'Ingredient name',
					'type'        => 'text',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'product_approach_section', 4, 5);

function product_build_section($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'products' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('product-5', 'Build section');

		$Section->add_group(
			'build_section',
			false,
			array(
				array(
					'name'        => 'build_title',
					'label'       => 'Section name',
					'type'        => 'text',
				),
				// array(
				// 	'type'        => 'colorpicker',
				// 	'name'        => 'build_bg',
				// 	'label'       => 'Section background color',
				// 	'default'     => '#fff',
				// ),
				array(
					'name'        => 'build_img',
					'label'       => 'Section background image',
					'type'        => 'image',
				),
			)
		);

		$Section->add_group(
			'build_step_one',
			false,
			array(
				array(
					'name'        => 'build_step_name1',
					'label'       => 'Step 1 name',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'build_step1',
			true,
			array(
				array(
					'name'        => 'build_img1',
					'label'       => 'Ingredient image',
					'type'        => 'image',
				),
				array(
					'name'        => 'build_name1',
					'label'       => 'Ingredient name',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'build_step_two',
			false,
			array(
				array(
					'name'        => 'build_step_name2',
					'label'       => 'Step 2 name',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'build_step2',
			true,
			array(
				array(
					'name'        => 'build_img2',
					'label'       => 'Ingredient image',
					'type'        => 'image',
				),
				array(
					'name'        => 'build_name2',
					'label'       => 'Ingredient name',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'build_step_three',
			false,
			array(
				array(
					'name'        => 'build_step_name3',
					'label'       => 'Step 3 name',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'build_step3',
			true,
			array(
				array(
					'name'        => 'build_img3',
					'label'       => 'Ingredient image',
					'type'        => 'image',
				),
				array(
					'name'        => 'build_name3',
					'label'       => 'Ingredient name',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'build_step_four',
			false,
			array(
				array(
					'name'        => 'build_step_name4',
					'label'       => 'Step 4 name',
					'type'        => 'text',
				),
			)
		);

		$Section->add_group(
			'build_step4',
			true,
			array(
				array(
					'name'        => 'build_img4',
					'label'       => 'Ingredient image',
					'type'        => 'image',
				),
				array(
					'name'        => 'build_name4',
					'label'       => 'Ingredient name',
					'type'        => 'text',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'product_build_section', 5, 5);


function product_recommended_section($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'products' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('product-6', 'Recommended section');

		$Section->add_group(
			'products_recommended_section',
			false,
			array(
				array(
					'name'        => 'recommended_title',
					'label'       => 'Section name',
					'type'        => 'text',
				),
				array(
					'type'        => 'relation',
					'name'        => 'recommended_list',
					'label'       => 'Products',
					'post-type'   => array('products'),
					'limit'       => 0,
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'product_recommended_section', 6, 5);

function product_reviews_section_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'products' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('product-7', 'Reviews');

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
add_filter('smart-cf-register-fields', 'product_reviews_section_fields', 7, 5);
