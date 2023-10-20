<?php

/**
 * frondendie functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package frondendie
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('frondendie_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function frondendie_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on frondendie, use a find and replace
		 * to change 'frondendie' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('frondendie', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'frondendie'),
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
				'frondendie_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

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

		add_theme_support('woocommerce');
	}
endif;
add_action('after_setup_theme', 'frondendie_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function frondendie_content_width()
{
	$GLOBALS['content_width'] = apply_filters('frondendie_content_width', 640);
}
add_action('after_setup_theme', 'frondendie_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function frondendie_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'frondendie'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'frondendie'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'frondendie_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function frondendie_scripts()
{
	wp_enqueue_style('swyper-style', get_template_directory_uri() . '/css/plugins/swiper-bundle.min.css', array(), _S_VERSION);
	wp_enqueue_style('frondendie-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('frondendie-style', 'rtl', 'replace');

	wp_deregister_script('jquery');
	wp_deregister_script('wp-embed-js');
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('jquery');

	wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('ScrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('MotionPath', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/MotionPathPlugin.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('swiper-slider', get_template_directory_uri() . '/js/plugins/swiper-bundle.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('relax-js', get_template_directory_uri() . '/js/plugins/relax.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('site-js', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'swiper-slider'), _S_VERSION, true);
	if (is_singular('products')) {
		wp_enqueue_style('product-style', get_template_directory_uri() . '/css/product.css', array(), _S_VERSION);
	}
	if (is_front_page()) {
		wp_enqueue_script('gmap-js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBVY9bdJtxFyjxthJGdsXG7G7A6jXPRFJg&&callback=initMap', array('site-js'), _S_VERSION, true);
	}
}
add_action('wp_enqueue_scripts', 'frondendie_scripts');

function admin_scripts()
{
	if (is_admin()) {
		wp_enqueue_style('frondendie-admin-style', get_template_directory_uri() . '/css/admin.css', array(), _S_VERSION);
	}
}
add_action('admin_enqueue_scripts', 'admin_scripts');

/**
 * SCF Home
 */
require get_template_directory() . '/scf/home.php';

/**
 * Contacts page from admin
 */
add_action('init', function () {
	SCF::add_options_page('Contacts', 'Our Contacts', 'manage_options', 'our-contacts', 'dashicons-location-alt', 25);
});

/**
 * SCF Contact.
 */
require get_template_directory() . '/scf/contacts.php';

add_action('init', 'create_projects_taxonomies');

// функция, создающая новые таксономии постов типа "projects"
function create_projects_taxonomies()
{

	// Добавляем НЕ древовидную таксономию 'project-category' (как метки)
	register_taxonomy('product-category', 'products', array(
		'hierarchical'  => false,
		'labels'        => array(
			'name'                        => _x('Product categories', 'taxonomy general name'),
			'singular_name'               => _x('Product category', 'taxonomy singular name'),
			'search_items'                =>  __('Search product categories'),
			'popular_items'               => __('Popular product categories'),
			'all_items'                   => __('All product categories'),
			'parent_item'                 => null,
			'parent_item_colon'           => null,
			'edit_item'                   => __('Edit product category'),
			'update_item'                 => __('Update product category'),
			'add_new_item'                => __('Add New product category'),
			'new_item_name'               => __('New product category Name'),
			'separate_items_with_commas'  => __('Separate product categories with commas'),
			'add_or_remove_items'         => __('Add or remove product category'),
			'choose_from_most_used'       => __('Choose from the most used product category'),
			'menu_name'                   => __('Product categories'),
		),
		'show_ui'       => true,
		'query_var'     => true,
		'meta_box_cb'     => 'post_categories_meta_box',
		//'rewrite'       => array( 'slug' => 'the_writer' ), // свой слаг в URL
	));
}

add_action('init', 'cases_register_post_type_init'); // Использовать функцию только внутри хука init

function cases_register_post_type_init()
{
	$labels = array(
		'name'			 	=> 'Products',
		'singular_name'	 	=> 'Product', // админ панель Добавить->Функцию
		'add_new' 		 	=> 'Add product',
		'add_new_item' 	 	=> 'Add new product', // заголовок тега <title>
		'edit_item' 	 	=> 'Edit product',
		'new_item'		 	=> 'New product',
		'all_items'	  	 	=> 'All products',
		'view_item'		 	=> 'Show products in site',
		'search_items' 	 	=> 'Search product',
		'not_found' 	 	=>  'Product not found',
		'not_found_in_trash' => 'Products not found in trash',
		'menu_name' 	 	=> 'Products' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => '', 'with_front' => false),
		'capability_type'    => 'page',
		'has_archive'        => 'menu',
		// 'has_archive'        => false,
		'menu_icon'			 => 'dashicons-buddicons-community', // иконка в меню
		'menu_position' 	 => 21, // порядок в меню
		'supports' 			 => array('title', 'page-attributes'),
		'taxonomies' 		 => array('product-category')
	);
	register_post_type('products', $args);
}

/**
 * SCF Product.
 */
require get_template_directory() . '/scf/products.php';
/**
 * SCF product category.
 */
require get_template_directory() . '/scf/product-category.php';

if (!defined('MENU_PAGE_ID')) {
	$current_page = get_page_by_path('menu');
	// var_dump($current_page->ID);
	define('MENU_PAGE_ID', $current_page->ID);
}

add_action('init', 'reviews_register_post_type_init'); // Использовать функцию только внутри хука init

function reviews_register_post_type_init()
{
	$labels = array(
		'name' => 'Reviews',
		'singular_name' => 'Review', // админ панель Добавить->Функцию
		'add_new' => 'Add review',
		'add_new_item' => 'Add new review', // заголовок тега <title>
		'edit_item' => 'Edit review',
		'new_item' => 'New review',
		'all_items' => 'All reviews',
		'view_item' => 'Show reviews in site',
		'search_items' => 'Search review',
		'not_found' =>  'Review not found',
		'not_found_in_trash' => 'Reviews not found in trash',
		'menu_name' => 'Reviews' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'page',
		// 'has_archive'        => false,
		'has_archive'        => 'reviews',
		'menu_icon' => 'dashicons-heart', // иконка в меню
		'menu_position' => 23, // порядок в меню
		'supports' => array('title')
	);
	register_post_type('reviews', $args);
}

/**
 * SCF Reviews.
 */
require get_template_directory() . '/scf/reviews.php';
require get_template_directory() . '/scf/story.php';
require get_template_directory() . '/scf/menu.php';
