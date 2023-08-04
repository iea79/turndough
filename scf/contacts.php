<?php
if (!defined('CONTACT_TYPE_NAME')) {
	define('CONTACT_TYPE_NAME', 'our-contacts');
}

function contacts_part_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type == CONTACT_TYPE_NAME) {

		$Section = SCF::add_setting('contacts_part', 'Edit your contact');

		$Section->add_group(
			'contacts_part_field',
			false,
			array(
				array(
					'name'        => 'contacts__addres',
					'label'       => 'Company address',
					'type'        => 'textarea',
				),
				array(
					'name'        => 'contacts__tel',
					'label'       => 'Company phone',
					'type'        => 'text',
					'notes'       => ''
				),
				array(
					'name'        => 'contacts__email_general',
					'label'       => 'Company general email',
					'type'        => 'text',
					'notes'       => ''
				),
				array(
					'name'        => 'contacts__email',
					'label'       => 'Company promotional email',
					'type'        => 'text',
					'notes'       => ''
				),
				array(
					'name'        => 'contacts__facebook',
					'label'       => 'Company facebook',
					'type'        => 'text',
					'notes'       => ''
				),
				array(
					'name'        => 'contacts__instagram',
					'label'       => 'Company instagram',
					'type'        => 'text',
					'notes'       => ''
				),
				array(
					'name'        => 'contacts__twitter',
					'label'       => 'Company twitter',
					'type'        => 'text',
					'notes'       => ''
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'contacts_part_fields', 10, 5);
