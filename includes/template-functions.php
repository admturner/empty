<?php
/**
 * Functions to modify WordPress defaults using hooks
 *
 * @package Bream
 * @since 0.4.0
 */
namespace Bream\Includes\TemplateFunctions;

/**
 * Modifies the stylesheet directory URI.
 *
 * @since 0.4.0
 *
 * @param string $stylesheet_dir_uri Stylesheet directory URI.
 * @param string $stylesheet         Name of the activated theme's directory.
 * @param string $theme_root_uri     The theme root URI.
 * @return string The path to the stylesheet directory.
 */
function adjust_stylesheet_directory_uri( $stylesheet_dir_uri ) {
	return $stylesheet_dir_uri . '/build/css';
}
add_filter( 'stylesheet_directory_uri', __NAMESPACE__ . '\adjust_stylesheet_directory_uri', 10, 1 );
