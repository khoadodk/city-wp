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
			'menu-1' => esc_html__( 'Header', 'our-mission' ),
			'menu-2' => esc_html__( 'Footer', 'our-mission' ),
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
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #1', 'our-mission' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'our-mission' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #2', 'our-mission' ),
			'id'            => 'footer-2',
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
	wp_enqueue_script( 'our-mission-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), time(), true );
	wp_enqueue_script( 'our-mission-menu', get_template_directory_uri() . '/assets/js/menu.js', array('jquery'), time(), true );
	wp_enqueue_script( 'our-mission-countdown', get_template_directory_uri() . '/assets/js/countdown.js', array('jquery'), time(), true );
	// Slick slider
	wp_enqueue_style('slick-css','https://cdn.jsdelivr.net/npm/slick-carousel@1.8.0/slick/slick.css');
	wp_enqueue_script('slick-js','https://cdn.jsdelivr.net/npm/slick-carousel@1.8.0/slick/slick.min.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css', array(), time(), 'all' );
	wp_enqueue_style( 'menu-style', get_template_directory_uri() . '/assets/css/menu.css', array(), time(), 'all' );
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

// Custom Post Types
function custom_post_type() {
	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name', 'our-mission' ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'our-mission' ),
		'menu_name'           => __( 'Projects', 'our-mission' ),
		'parent_item_colon'   => __( 'Parent Project', 'our-mission' ),
		'all_items'           => __( 'All Projects', 'our-mission' ),
		'view_item'           => __( 'View Project', 'our-mission' ),
		'add_new_item'        => __( 'Add New Project', 'our-mission' ),
		'add_new'             => __( 'Add New', 'our-mission' ),
		'edit_item'           => __( 'Edit Project', 'our-mission' ),
		'update_item'         => __( 'Update Project', 'our-mission' ),
		'search_items'        => __( 'Search Project', 'our-mission' ),
		'not_found'           => __( 'Not Found', 'our-mission' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'our-mission' ),
	);
		  
	// Set other options for Custom Post Type
		
	$args = array(
		'label'               => __( 'Projects', 'our-mission' ),
		'description'         => __( 'Project news and reviews', 'our-mission' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
	  
	);  
	// Registering your Custom Post Type
	register_post_type( 'projects', $args );

	// Initiative
	$initiative_labels = array(
		'name'                => _x( 'Initiatives', 'Post Type General Name', 'our-mission' ),
		'singular_name'       => _x( 'Initiative', 'Post Type Singular Name', 'our-mission' ),
		'menu_name'           => __( 'Initiatives', 'our-mission' ),
		'parent_item_colon'   => __( 'Parent Initiative', 'our-mission' ),
		'all_items'           => __( 'All Initiatives', 'our-mission' ),
		'view_item'           => __( 'View Initiative', 'our-mission' ),
		'add_new_item'        => __( 'Add New Initiative', 'our-mission' ),
		'add_new'             => __( 'Add New', 'our-mission' ),
		'edit_item'           => __( 'Edit Initiative', 'our-mission' ),
		'update_item'         => __( 'Update Initiative', 'our-mission' ),
		'search_items'        => __( 'Search Initiative', 'our-mission' ),
		'not_found'           => __( 'Not Found', 'our-mission' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'our-mission' ),
	);
		  
	// Set other options for Custom Post Type
		
	$initiative_args = array(
		'label'               => __( 'Initiatives', 'our-mission' ),
		'description'         => __( 'Initiative news and reviews', 'our-mission' ),
		'labels'              => $initiative_labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
	);
	register_post_type( 'initiatives', $initiative_args );  
			  
	// Events Custom Post Type
	$event_labels = array(
		'name'                => _x( 'Events', 'Post Type General Name', 'our-mission' ),
		'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'our-mission' ),
		'menu_name'           => __( 'Events', 'our-mission' ),
		'parent_item_colon'   => __( 'Parent Event', 'our-mission' ),
		'all_items'           => __( 'All Events', 'our-mission' ),
		'view_item'           => __( 'View Event', 'our-mission' ),
		'add_new_item'        => __( 'Add New Event', 'our-mission' ),
		'add_new'             => __( 'Add New', 'our-mission' ),
		'edit_item'           => __( 'Edit Event', 'our-mission' ),
		'update_item'         => __( 'Update Event', 'our-mission' ),
		'search_items'        => __( 'Search Event', 'our-mission' ),
		'not_found'           => __( 'Not Found', 'our-mission' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'our-mission' ),
	);

	$event_args = array(
		'label'               => __( 'Events', 'our-mission' ),
		'description'         => __( 'Event news and reviews', 'our-mission' ),
		'labels'              => $event_labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
	);
	register_post_type( 'events', $event_args );  

	// Charities Custom Post Type
	$charity_labels = array(
		'name'                => _x( 'Charities', 'Post Type General Name', 'our-mission' ),
		'singular_name'       => _x( 'Charity', 'Post Type Singular Name', 'our-mission' ),
		'menu_name'           => __( 'Charities', 'our-mission' ),
		'parent_item_colon'   => __( 'Parent Charity', 'our-mission' ),
		'all_items'           => __( 'All Charities', 'our-mission' ),
		'view_item'           => __( 'View Charity', 'our-mission' ),
		'add_new_item'        => __( 'Add New Charity', 'our-mission' ),
		'add_new'             => __( 'Add New', 'our-mission' ),
		'edit_item'           => __( 'Edit Charity', 'our-mission' ),
		'update_item'         => __( 'Update Charity', 'our-mission' ),
		'search_items'        => __( 'Search Charity', 'our-mission' ),
		'not_found'           => __( 'Not Found', 'our-mission' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'our-mission' ),
	);

	$charity_args = array(
		'label'               => __( 'Charities', 'our-mission' ),
		'description'         => __( 'Charity news and reviews', 'our-mission' ),
		'labels'              => $charity_labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
	);
	register_post_type( 'charity', $charity_args );   
}
	  
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
add_action( 'init', 'custom_post_type', 0 );

// Remove brackets in the end of except
add_filter( 'excerpt_more', function(){
	return '...';
});
add_filter( 'excerpt_length', function($length){
	if(is_front_page()){
		return 15;
	}
	return $length;
});

/**
 * Add arrows to menu.
*/
add_filter( 'nav_menu_item_title', 'our_nav_menu_item_title', 10, 4 );
function our_nav_menu_item_title( $title, $menu_item, $args, $depth ) {

	if ( 0 === $depth && in_array( 'menu-item-has-children', $menu_item->classes, true ) ) {
		$title .= '<span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
	<path d="M7.32824 10.3125C7.2111 10.3125 7.09385 10.2667 7.00442 10.1752L2.42427 5.48769C2.2453 5.30452 2.2453 5.00792 2.42427 4.82487C2.60324 4.64183 2.89304 4.64171 3.0719 4.82487L7.32824 9.18097L11.5846 4.82487C11.7635 4.64171 12.0533 4.64171 12.2322 4.82487C12.4111 5.00804 12.4112 5.30464 12.2322 5.48769L7.65205 10.1752C7.56262 10.2667 7.44537 10.3125 7.32824 10.3125Z" fill="#fff"/>
	</svg></span>';
	} elseif ( 0 !== $depth && in_array( 'menu-item-has-children', $menu_item->classes, true ) ) {
		$title .= '<span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
		<path d="M10.3125 7.32801C10.3125 7.44515 10.2667 7.5624 10.1752 7.65183L5.48769 12.232C5.30452 12.411 5.00792 12.411 4.82487 12.232C4.64183 12.053 4.64171 11.7632 4.82487 11.5844L9.18097 7.32801L4.82487 3.07168C4.64171 2.89271 4.64171 2.6029 4.82487 2.42405C5.00804 2.24519 5.30464 2.24508 5.48768 2.42405L10.1752 7.0042C10.2667 7.09363 10.3125 7.21088 10.3125 7.32801Z" fill="#fff"/>
		</svg></span>';
	}
	return $title;
}

// Imported functions
require_once get_template_directory() . '/inc/utils.php';