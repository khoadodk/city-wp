<?php
if ( class_exists( 'Redux' ) ) {
	$opt_name = 'ourm_settings';
	$theme    = wp_get_theme();

	$args = array(
		'display_name'    => $theme->get( 'Name' ),
		'display_version' => $theme->get( 'Version' ),
		'menu_title'      => esc_html__( 'Redux fields', 'our-mission' ),
		'customizer'      => true,
	);

	Redux::set_args( $opt_name, $args );

    // Contacts section (Front page) 
	Redux::set_section(
		$opt_name,
		array(
			'title'  => esc_html__( 'Contact Section', 'our-mission' ),
			'id'     => 'contacts',
			'icon'   => 'el el-admin',
			'fields' => array(
				array(
					'id'    => 'contacts_tel',
					'type'  => 'text',
					'title' => esc_html__( 'Phone', 'your-textdomain-here' ),
				),
				array(
					'id'    => 'contacts_working_hours',
					'type'  => 'text',
					'title' => esc_html__( 'Working hours', 'your-textdomain-here' ),
				),
				array(
					'id'    => 'contacts_email',
					'type'  => 'text',
					'title' => esc_html__( 'Email', 'your-textdomain-here' ),
				),
				array(
					'id'    => 'contacts_addr',
					'type'  => 'text',
					'title' => esc_html__( 'Address', 'your-textdomain-here' ),
				),
				array(
					'id'     => 'redux_socials',
					'type'   => 'repeater',
					'title'  => esc_html__( 'Socials', 'your-textdomain-here' ),
					'group_values' => true,
					'fields' => array(
						array(
							'id'    => 'link_text',
							'type'    => 'text',
							'title' => esc_html__( 'Name', 'our-mission' ),
						),
						array(
							'id'    => 'link_url',
							'type'  => 'text',
							'title' => esc_html__( 'Link', 'our-mission' ),
						),
						array(
							'id'    => 'link_icon',
							'type'  => 'media',
							'title' => __( 'Icon', 'our-mission' ),
						),
					),

				),
				array(
					'id'    => 'contacts_map',
					'type'  => 'editor',
					'title' => esc_html__( 'Map', 'your-textdomain-here' ),
				),
			),
		)
	);
}
?>