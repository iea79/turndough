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
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'product_fields', 1, 5);
