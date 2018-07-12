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
 * Retrieves the Bream Theme version.
 *
 * @since 0.3.2
 *
 * @return string The version number in semver format.
 */
function get_bream_version() {
	$bream_theme_version = '0.3.2';

	return $bream_theme_version;
}

/**
 * Sets up Bream theme configuration and settings.
 *
 * @since 0.3.0
 */
require get_template_directory() . '/includes/class-bream-setup.php';

/**
 * Instantiates the Bream Setup class.
 */
setup_bream_theme();

add_action( 'wp_enqueue_scripts', 'bream_styles_and_scripts' );
add_action( 'wp_head', 'bream_noscript_styles' );

if ( ! function_exists( 'bream_fonts_url' ) ) :
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

			$font_families[] = 'IBM+Plex+Sans:400,400i,600,600i,700,700i';

			$query_args = array(
				'family' => implode( '|', $font_families ),
				'subset' => 'latin-ext',
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;

if ( ! function_exists( 'bream_styles_and_scripts' ) ) :
	/**
	 * Enqueues the styles and scripts.
	 *
	 * @since 0.3.0
	 */
	function bream_styles_and_scripts() {
		// Add custom fonts, used in the main stylesheet.
		wp_enqueue_style( 'bream-fonts', bream_fonts_url(), array(), null );

		// Add theme stylesheet.
		wp_enqueue_style( 'bream-style', get_stylesheet_uri(), array(), get_bream_version() );
	}
endif;

if ( ! function_exists( 'bream_noscript_styles' ) ) :
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
endif;
