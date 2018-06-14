<?php
/**
 * Bream functions and definitions
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

/**
 * Tracks Bream Theme Version
 *
 * @since 0.3.0
 */
$bream_theme_version = '0.3.0';

if ( ! function_exists( 'bream_setup' ) ) :
    /**
     * Sets up the Bream Theme defaults.
     *
     *
     * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook.
	 *
     * @since 0.3.0
     */
    function bream_setup() {
        /*
    	 * Makes theme vailable for translation.
         *
    	 * If you're building a theme based on Bream, use a find and replace to
    	 * change 'bream' to the name of your theme in all the template files.
    	 */
    	load_theme_textdomain( 'bream' );

        /*
    	 * Styles the visual editor.
         *
         * Call a stylesheet on the admin edit page to style the visual editor
         * to resemble the theme style.
         *
         * @TODO Experiment with this in relation to Gutenberg.
     	 */
    	add_editor_style( 'assets/css/editor-style.css' );

        // Enables support for WP features.
        bream_add_theme_supports();

        // Defines various media sizes.
        bream_media_sizes();

        /**
         * Registers navigation menus.
         *
         * This theme uses only one nav menu by default, but can support as many
         * as you want. Simply add more lines to the array.
         */
    	register_nav_menus( array(
    		'primary-menu'    => esc_html__( 'Primary', 'bream' ),
    	) );
    }
endif;
add_action( 'after_setup_theme', 'bream_setup' );

/**
 * Registers support for various WP features.
 *
 * Certain features in WordPress, such as featured images, are not enabled
 * by default. This function, called in 'bream_setup', adds theme support
 * for some of them, including:
 *
 *     - 'automatic-feed-links'     Adds RSS feed links to head.
 *     - 'title-tag'                Give WP control of the document title.
 *     - 'post-thumbnails'          Enables featured images.
 *
 * @since 0.3.0
 */
function bream_add_theme_supports() {
    /*
     * Adds posts and comments RSS feed links to head.
     */
	add_theme_support( 'automatic-feed-links' );

    /*
     * Gives WordPress control over the document title.
     *
     * Using this method we hand control of the `<title>` tag to WordPress,
     * instead of hard-coding it in the header.php file ourselves.
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
     *
     * Use valid HTML5 for search form, comment form, and comments markup
	 * output.
	 */
	add_theme_support( 'html5', array(
        'caption',
        'comment-form',
		'comment-list',
        'gallery',
        'search-form',
	) );

    /*
     * Uncomment the following sections if you want them
     */
     /*
 	 * Enable support for Post Formats.
 	 *
 	 * See: https://codex.wordpress.org/Post_Formats
 	 */
 	/* add_theme_support( 'post-formats', array(
 		'aside',
 		'image',
 		'video',
 		'quote',
 		'link',
 		'gallery',
 		'audio',
 	) ); */

 	// Add theme support for Custom Logo.
 	/* add_theme_support( 'custom-logo', array(
 		'width'       => 250,
 		'height'      => 250,
 		'flex-width'  => true,
 	) ); */

 	// Add theme support for selective refresh for widgets.
 	// add_theme_support( 'customize-selective-refresh-widgets' );
}

/**
 * Sets image and embed sizes.
 *
 * Define custom image sizes here (will be added to "Thumbnail", "Medium",
 * "Large" and "Full Size"). If you specify "true" as the fourth parameter
 * WordPress will automatically crop the image on upload to match the set
 * dimensions; "false" will do a proportional soft crop instead.
 * {@link https://developer.wordpress.org/reference/functions/add_image_size/}
 *
 * @since 0.3.0
 */
function bream_media_sizes() {
	// Set the default content width.
	$GLOBALS['content_width'] = 723;

    // Register additional image sizes.
    add_image_size( 'bream-hero-image', 2000, 600, true );
    // add_image_size( 'name', width, height, bool|array $crop = false )
}

/**
 * Handles JavaScript detection.
 *
 * Replaces the `no-js` class on the root `<html>` tag with `js` when
 * JavaScript is detected.
 *
 * @since 0.3.0
 */
function bream_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'bream_javascript_detection', 0 );

/**
 * Builds the custom fonts path.
 *
 * Called in 'bream_styles_and_scripts' and used in the theme stylesheets.
 * Modified from the WP twentyseventeen theme. If you want a different font and
 * still want to use Google Fonts, just change the $font_families array and
 * $query_args parameters.
 *
 * @since 0.3.0
 *
 * @return string $fonts_url The full URL path to Google Fonts.
 */
function bream_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by IBM Plex Sans, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$ibm_plex = _x( 'on', 'IBM Plex Sans font: on or off', 'bream' );

	if ( 'off' !== $ibm_plex ) {
		$font_families = array();

		$font_families[] = 'IBM+Plex+Sans:300,300i,400,400i,700,700i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Adds preconnect for external resources.
 *
 * Recycled from the WP Twenty Seventeen theme, this adds Google's fonts.gstatic
 * domain to the WP resource hints to help the browser with preconnet decisions.
 *
 * @since 0.3.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function bream_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'bream-fonts', 'enqueued' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'bream_resource_hints', 10, 2 );

/**
 * Enqueues the styles and scripts.
 *
 * @since 0.3.0
 */
function bream_styles_and_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'bream-fonts', bream_fonts_url(), array(), null );

	// Add theme stylesheet.
	wp_enqueue_style( 'bream-style', get_stylesheet_uri() );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'bream-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'bream-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$twentyseventeen_l10n = array(
		'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bream_styles_and_scripts' );
