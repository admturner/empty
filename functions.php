<?php
/**
 * Bream functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * The file for theme setup and functions that adjust standard WordPress
 * functionality such as adding theme support, widgets, and enqueuing styles
 * and scripts.
 *
 * Author: Adam Turner
 * URL: https://github.com/admturner/bream/
 *
 * @package Bream
 * @since 0.1.0
 */

namespace Bream\Functions;

use Bream\Includes\HelperFunctions;

if ( ! function_exists( 'bream_setup' ) ) :
	/**
	 * Sets up the Bream theme configuration and settings.
	 *
	 * @since 0.3.0
	 */
	function bream_setup() {
		// Define Bream theme colors.
		$theme_colors = array(
			array(
				'name'  => __( 'Dark blue', 'bream' ),
				'slug'  => 'dark-blue',
				'color' => '#282a36',
			),
			array(
				'name'  => __( 'Light gray', 'bream' ),
				'slug'  => 'light-gray',
				'color' => '#f8f8f2',
			),
			array(
				'name'  => __( 'Tan', 'bream' ),
				'slug'  => 'tan',
				'color' => '#cfcfc2',
			),
			array(
				'name'  => __( 'Cyan', 'bream' ),
				'slug'  => 'cyan',
				'color' => '#8be9fd',
			),
			array(
				'name'  => __( 'Green', 'bream' ),
				'slug'  => 'green',
				'color' => '#50fa7b',
			),
			array(
				'name'  => __( 'Orange', 'bream' ),
				'slug'  => 'orange',
				'color' => '#ffb86c',
			),
			array(
				'name'  => __( 'Pink', 'bream' ),
				'slug'  => 'pink',
				'color' => '#ff79c6',
			),
			array(
				'name'  => __( 'Purple', 'bream' ),
				'slug'  => 'purple',
				'color' => '#bd93f9',
			),
			array(
				'name'  => __( 'Red', 'bream' ),
				'slug'  => 'red',
				'color' => '#ff5555',
			),
			array(
				'name'  => __( 'Yellow', 'bream' ),
				'slug'  => 'yellow',
				'color' => '#f1fa8c',
			),
		);

		// Define Bream theme font sizes.
		$font_sizes = array(
			array(
				'name' => __( 'Small', 'bream' ),
				'size' => 14.22,
				'slug' => 'small',
			),
			array(
				'name' => __( 'Normal', 'bream' ),
				'size' => 18,
				'slug' => 'normal',
			),
			array(
				'name' => __( 'Medium', 'bream' ),
				'size' => 22.788,
				'slug' => 'medium',
			),
			array(
				'name' => __( 'Large', 'bream' ),
				'size' => 28.836,
				'slug' => 'large',
			),
			array(
				'name' => __( 'Huge', 'bream' ),
				'size' => 36.486,
				'slug' => 'huge',
			),
		);

		/**
		 * Makes theme available for translation.
		 *
		 * If you're building a theme based on Bream, use a find and replace to
		 * change 'bream' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bream', get_template_directory() . '/languages' );

		/**
		 * Enqueues the editor stylesheet.
		 */
		add_editor_style( '/build/css/style-editor.css' );

		/**
		 * This theme uses wp_nav_menu() in two locations.
		 */
		register_nav_menus(
			array(
				'primary-nav' => esc_html__( 'Primary Navigation', 'bream' ),
				'footer-nav'  => esc_html__( 'Footer Menu', 'bream' ),
			)
		);

		/**
		 * This theme adds a "small" image size option.
		 *
		 * The default value and media settings form are managed in
		 * `/includes/options-functions.php`.
		 */
		add_image_size( 'size-small', get_option( 'small_size_w' ), get_option( 'small_size_h' ) );

		/**
		 * Add theme support registers theme support for various WP features.
		 *
		 * Certain features in WordPress, such as featured images, are not enabled
		 * by default. This function adds theme support for some of them.
		 *
		 * @see https://developer.wordpress.org/reference/functions/add_theme_support/
		 */
		$theme_supports = array(
			'align-wide'                          => '',
			'automatic-feed-links'                => '',
			'customize-selective-refresh-widgets' => '',
			'disable-custom-colors'               => '',
			'disable-custom-font-sizes'           => '',
			'editor-color-palette'                => $theme_colors,
			'editor-font-sizes'                   => $font_sizes,
			'editor-styles'                       => '',
			'html5'                               => array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ),
			'post-thumbnails'                     => '',
			'responsive-embeds'                   => '',
			'title-tag'                           => '',
		);

		/**
		 * Filters the features supported by Bream.
		 *
		 * This filter allows users to add (or more likely remove) features
		 * from the `theme_supports` array. For example, add the filter with a
		 * callback function that calls something like:
		 * `unset( $theme_supports['disable-custom-font-sizes'] )` and then
		 * returns the modifed $theme_supports array.
		 *
		 * @since 0.4.0
		 *
		 * @param string[]|array $theme_supports The array of theme support features with optional arguments.
		 */
		$theme_supports = apply_filters( 'bream_theme_supports', $theme_supports );

		foreach ( $theme_supports as $feature => $args ) {
			if ( '' !== $args ) {
				add_theme_support( $feature, $args );
			} else {
				add_theme_support( $feature );
			}
		}
	}
endif;
add_action( 'after_setup_theme', __NAMESPACE__ . '\bream_setup' );

/**
 * Enqueues the styles and scripts.
 *
 * @since 0.3.0
 */
function bream_styles_and_scripts() {
	// Add theme stylesheet.
	wp_enqueue_style( 'bream-style', get_stylesheet_uri(), array(), HelperFunctions\get_bream_version() );

	wp_style_add_data( 'bream-style', 'rtl', 'replace' );

	// Add print stylesheet.
	wp_enqueue_style( 'bream-print-style', get_stylesheet_directory_uri() . '/print.css', array(), HelperFunctions\get_bream_version() );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\bream_styles_and_scripts' );

/**
 * Adds a noscript element for HRS styles.
 *
 * @since 0.3.0
 */
function bream_noscript_styles() {
	?>
	<noscript><style></style></noscript>
	<?php
}
add_action( 'wp_head', __NAMESPACE__ . '\bream_noscript_styles' );

/**
 * Registers widget area(s).
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Main Widgets', 'bream' ),
			'id'            => 'sidebar-main',
			'description'   => __( 'Widgets added here appear in the main content area.', 'bream' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Widgets', 'bream' ),
			'id'            => 'sidebar-footer',
			'description'   => __( 'Widgets added here appear in the footer.', 'bream' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', __NAMESPACE__ . '\widgets_init' );

/**
 * Functions that help other functions.
 */
require get_template_directory() . '/includes/helper-functions.php';

/**
 * Functions to handle theme options and settings.
 */
require get_template_directory() . '/includes/options-functions.php';

/**
 * Modify WordPress defaults using hooks.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Custom template tags.
 */
require get_template_directory() . '/includes/template-tags.php';
