<?php
if( class_exists( 'Kirki' ) ) {
    new \Kirki\Panel(
		'our_mission_setting',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'Our Mission Panel', 'our-mission' ),
		]
	);

	new \Kirki\Section(
		'our_mission_banner',
		[
			'title'       => esc_html__( 'Banner on front page', 'our-mission' ),
			'description' => esc_html__( 'Setting up a banner', 'our-mission' ),
			'panel'       => 'our_mission_setting',
			'priority'    => 160,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'our_mission_banner_title',
			'label'    => esc_html__( 'Title', 'our-mission' ),
			'section'  => 'our_mission_banner',
			'default'  => esc_html__( 'This is a default value', 'our-mission' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'our_mission_banner_subtitle',
			'label'    => esc_html__( 'Subtitle', 'our-mission' ),
			'section'  => 'our_mission_banner',
			'default'  => esc_html__( 'This is a default value', 'our-mission' ),
			'priority' => 10,
		]
	);

	new Kirki\Field\Repeater(
		array(
			'settings' => 'our_mission_socials',
			'label'    => esc_html__( 'Socials', 'our-mission' ),
			'section'  => 'our_mission_banner',
			'priority' => 10,
			'row_label'    => array(
				'value' => esc_html__( 'social', 'our-mission' ),
				'field' => 'link_text',
			),
			'default'      => array(
				array(
					'link_text' => esc_html__( 'Facebook', 'our-mission' ),
					'link_icon' => '',
					'link_url'  => 'https://facebook.com',
				),
				array(
					'link_text' => esc_html__( 'Telegram', 'our-mission' ),
					'link_icon' => '',
					'link_url'  => 'https://web.telegram.org',
				),
				array(
					'link_text' => esc_html__( 'Instagram', 'our-mission' ),
					'link_icon' => '',
					'link_url'  => 'https://instagram.com',
				),
			),
			'fields'       => array(
				'link_text' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Name', 'our-mission' ),	
					'default' => '',
				),
				'link_url'  => array(
					'type'    => 'link',
					'label'   => esc_html__( 'Link', 'our-mission' ),
					'default' => '',
				),
				'link_icon' => array(
					'type'    => 'image',
					'label'   => esc_html__( 'Icon', 'our-mission' ),
					'default' => '',
				),
			),
		)
	);

	new \Kirki\Field\Image(
		[
			'settings'    => 'our_mission_banner_image',
			'label'       => esc_html__( 'Banner Image', 'our-mission' ),
			'description' => esc_html__( 'Insert an image', 'our-mission' ),
			'section'     => 'our_mission_banner',
			'default'     => ''
		]
	);
}