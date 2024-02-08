<?php
if (!defined('BLOG_PAGE_ID')) {
	$current_page = get_page_by_path('blog');
	define('BLOG_PAGE_ID', $current_page->ID);
}

function blog_page_fields($settings, $type, $id, $meta_type, $types)
{
	if (BLOG_PAGE_ID == $id) {

		$Section = SCF::add_setting('blog-1', 'Page settings');

		$Section->add_group(
			'blog-settings',
			false,
			array(
				array(
					'type'        => 'relation',
					'name'        => 'blog_list',
					'label'       => 'Posts',
					'post-type'   => array('post'),
					'limit'       => 0,
				),
				array(
					'type'        => 'image',
					'name'        => 'blog_img1',
					'label'       => 'Image 1',
					'size'        => 'medium',
				),
				array(
					'type'        => 'image',
					'name'        => 'blog_img2',
					'label'       => 'Image 2',
					'size'        => 'medium',
				),
				array(
					'type'        => 'text',
					'name'        => 'blog_form_title',
					'label'       => 'Form title',
				),
				array(
					'type'        => 'textarea',
					'name'        => 'blog_form_text',
					'label'       => 'Form text',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'blog_page_fields', 1, 5);
