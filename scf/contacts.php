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
					'label'       => 'Hollivood address',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'contacts__tel',
					'label'       => 'Hollivood phone',
					'type'        => 'text',
					'notes'       => ''
				),
				array(
					'name'        => 'contacts__email_general',
					'label'       => 'Hollivood general email',
					'type'        => 'text',
					'notes'       => ''
				),
				array(
					'name'        => 'contacts__email',
					'label'       => 'Hollivood promotional email',
					'type'        => 'text',
					'notes'       => ''
				),
				array(
					'name'        => 'contacts__addres2',
					'label'       => 'Venice address',
					'type'        => 'wysiwyg',
				),
				array(
					'name'        => 'contacts__tel2',
					'label'       => 'Venice phone',
					'type'        => 'text',
					'notes'       => ''
				),
				array(
					'name'        => 'contacts__email_general2',
					'label'       => 'Venice general email',
					'type'        => 'text',
					'notes'       => ''
				),
				array(
					'name'        => 'contacts__email2',
					'label'       => 'Venice promotional email',
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
