<?php
/**
 * Wpbrigade functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpbrigade
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
function wp_brigade_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wpbrigade, use a find and replace
		* to change 'wp-brigade' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wp-brigade', get_template_directory() . '/languages' );

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
			'wpbrigade-header-menu' => esc_html__( 'Header Menu', 'wp-brigade' ),
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
add_action( 'after_setup_theme', 'wp_brigade_setup' );


/**
 * Allow svg's
 */

add_filter(
	'wp_check_filetype_and_ext',
	function ( $data, $file, $filename, $mimes ) {
		$filetype = wp_check_filetype( $filename, $mimes );
		return array(
			'ext'             => $filetype['ext'],
			'type'            => $filetype['type'],
			'proper_filename' => $data['proper_filename'],
		);
	},
	10,
	4
);


/**
 *
 * Function to check file type
 *
 * @param string $mimes array of file types.
 */
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


/**
 * Function to fix svg
 */
function fix_svg() {
	echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );



/**
 * Theme widgets sidebar and footer
 */
add_action( 'widgets_init', 'wpbrigade_widgets_init' );

/**
 * Storing theme footer and sidebar widgets
 */
function wpbrigade_widgets_init() {
	/* Register the 'Main' sidebar. */
	register_sidebar(
		array(
			'id'            => 'sidebar_widgets',
			'name'          => __( 'Sidebar Widgets' ),
			'description'   => __( 'Widgets to add in sidebar of theme' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	/* Register the 'footer' sidebar. */
	register_sidebar(
		array(
			'id'            => 'footer_widgets',
			'name'          => __( 'Footer Widgets' ),
			'description'   => __( 'Widgets to add in footer of theme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}



/**
 * Enqueue scripts and styles.
 */
function wp_brigade_scripts() {
	wp_enqueue_style( 'wp-brigade-style', get_stylesheet_uri(), array(), '1.0.0' );
	wp_enqueue_style( 'wp-brigade-header-style', get_template_directory_uri() . '/css/header.css', array(), '1.0.0' );
	wp_enqueue_style( 'wp-brigade-slider-style', get_template_directory_uri() . '/css/slider.css', array(), '1.0.0' );
	wp_enqueue_style( 'wp-brigade-mainflex-style', get_template_directory_uri() . '/css/main+flex.css', array(), '1.0.0' );
	wp_enqueue_style( 'wp-brigade-sidebar-style', get_template_directory_uri() . '/css/siderbar.css', array(), '1.0.0' );
	wp_enqueue_style( 'wp-brigade-tabs-style', get_template_directory_uri() . '/css/tabs.css', array(), '1.0.0' );
	wp_enqueue_style( 'wp-brigade-footer-style', get_template_directory_uri() . '/css/footer.css', array(), '1.0.0' );
	wp_enqueue_style( 'wp-brigade-responsive-style', get_template_directory_uri() . '/css/responsive.css', array(), '1.0.0' );

	wp_enqueue_script( 'wp-brigade-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'wp-brigade-main', get_template_directory_uri() . '/js/main.js', array( 'jquery', 'wp-brigade-slick' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wp_brigade_scripts' );


/**
 * Include theme options function-admin file
 */

require_once get_template_directory() . '/inc/function-admin.php';
require_once get_template_directory() . '/inc/settings-api.php';
require_once get_template_directory() . '/inc/option-cpt.php';
require_once get_template_directory() . '/inc/general-cpt.php';
require_once get_template_directory() . '/inc/class-custom-metabox-slides.php';
require_once get_template_directory() . '/inc/class-date-widget.php';
