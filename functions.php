<?php
/**
 * our-mission functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package our-mission
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function our_mission_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on our-mission, use a find and replace
		* to change 'our-mission' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'our-mission', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'our-mission' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'our_mission_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'our_mission_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function our_mission_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'our_mission_content_width', 640 );
}
add_action( 'after_setup_theme', 'our_mission_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function our_mission_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'our-mission' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'our-mission' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'our_mission_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function our_mission_scripts() {
	wp_enqueue_style( 'our-mission-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'our-mission-style', 'rtl', 'replace' );

	wp_enqueue_script( 'our-mission-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css', array(), time(), 'all' );
}
add_action( 'wp_enqueue_scripts', 'our_mission_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// KIRKI Customizer
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