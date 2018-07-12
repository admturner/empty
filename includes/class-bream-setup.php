<?php
/**
 * Bream Theme Setup: Bream_Setup Class
 *
 * Sets up the Bream theme configuration and WP settings.
 *
 * @package Bream
 * @since 0.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * The Bream theme setup class.
 *
 * @since 0.3.0
 */
class Bream_Setup {
	/**
	 * Instantiates the Bream_Setup singleton.
	 *
	 * @since 0.3.0
	 *
	 * @return object \Bream_Setup
	 */
	public static function get_instance() {
		static $instance = null;

		// Only set up and activate if it hasn't already been done.
		if ( null === $instance ) {
			$instance = new Bream_Setup();
			$instance->setup_actions();
			$instance->setup_filters();
			$instance->includes();
		}

		return $instance;
	}

	/**
	 * Empty construtor prevents multiple instances of Bream_Setup.
	 *
	 * @since 0.3.0
	 */
	public function __construct() {
		/* (^..^)ﾉ */
	}

	/**
	 * Sets up action hooks in the WordPress API.
	 *
	 * @since 0.3.0
	 *
	 * @access private
	 */
	private function setup_actions() {
		add_action( 'after_setup_theme', array( $this, 'configure' ) );
		add_action( 'after_setup_theme', array( $this, 'theme_support' ) );
		add_action( 'after_setup_theme', array( $this, 'setup_nav_menus' ) );
		add_action( 'after_setup_theme', array( $this, 'media_sizes' ), 0 );
	}

	/**
	 * Sets up filter hooks in the WordPress API.
	 *
	 * @since 0.3.0
	 *
	 * @access private
	 */
	private function setup_filters() {
		add_filter( 'wp_resource_hints', array( $this, 'resource_hints' ), 10, 2 );
	}

	/**
	 * Includes files required by the Bream theme.
	 *
	 * @since 0.3.0
	 *
	 * @access private
	 */
	private function includes() {
		// Coming soon.
		// require get_template_directory() . '/filename.php';
	}

	/**
	 * Configures the theme defaults.
	 *
	 * @since 0.3.0
	 */
	public function configure() {
		/*
		 * Makes theme available for translation.
		 *
		 * If you're building a theme based on Bream, use a find and replace to
		 * change 'bream' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bream' );
	}

	/**
	 * Registers theme support for various WP features.
	 *
	 * Certain features in WordPress, such as featured images, are not enabled
	 * by default. This function adds theme support for some of them.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
	 * @uses add_theme_support
	 *
	 * @since 0.3.0
	 */
	public function theme_support() {
		/*
		 * Adds posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Gives WordPress control over the document title.
		 *
		 * Let WordPress generate the `<title>` element instead of hard-coding
		 * it in the header.php.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enables support for Featured Images on posts and pages.
		 *
		 * These are also sometimes called Post Thumbnails.
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switches default HTML markup to HTML5.
		 */
		add_theme_support( 'html5', array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		) );

		/* Uncomment the following sections if you want them */

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		/*
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		) );
		*/

		// Add theme support for Custom Logo.
		/*
		add_theme_support( 'custom-logo', array(
			'width'       => 250,
			'height'      => 250,
			'flex-width'  => true,
		) );
		*/

		// Add theme support for selective refresh for widgets.
		/*
		add_theme_support( 'customize-selective-refresh-widgets' );
		*/
	}

	/**
	 * Registers the Bream WP Nav menus.
	 *
	 * @uses register_nav_menus
	 *
	 * @since 0.3.0
	 */
	public function setup_nav_menus() {
		register_nav_menus( array(
			'site-nav' => esc_html__( 'Primary', 'bream' ),
		) );
	}

	/**
	 * Sets default embedded content width and media sizes.
	 *
	 * Define custom image sizes here (will be added to "Thumbnail", "Medium",
	 * "Large" and "Full Size"). If you specify "true" as the fourth parameter
	 * WordPress will automatically crop the image on upload to match the set
	 * dimensions; "false" will do a proportional soft crop instead.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_image_size/
	 *
	 * @since 0.3.0
	 */
	public function media_sizes() {
		// Set the default content width.
		$GLOBALS['content_width'] = apply_filters( '_s_content_width', 700 );

		// Register additional image sizes.
		add_image_size( 'bream-hero-image', 2000, 600, true );
	}

	/**
	 * Adds preconnect for external resources.
	 *
	 * This adds Google's fonts.gstatic domain to the WP resource hints to help
	 * the browser with preconnet decisions.
	 *
	 * @since 0.3.0
	 *
	 * @param array  $urls URLs to print for resource hints.
	 * @param string $relation_type The relation type the URLs are printed.
	 * @return array $urls URLs to print for resource hints.
	 */
	public function resource_hints( $urls, $relation_type ) {
		if ( wp_style_is( 'bream-fonts', 'enqueued' ) && 'preconnect' === $relation_type ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		}

		return $urls;
	}

} // End Bream_Setup()

/**
 * Instantiates the Bream Setup class once.
 *
 * Use this function like you might use a global variable or a direct call to
 * `Bream_Setup::get_instance()`. This is a variation on the singleton design
 * pattern to make sure setup only runs once.
 *
 * @since 0.3.0
 *
 * @return object /Bream_Setup
 */
function setup_bream_theme() {
	return Bream_Setup::get_instance();
}
