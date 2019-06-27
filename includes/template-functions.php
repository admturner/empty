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
 * @return string The path to the stylesheet directory.
 */
function adjust_stylesheet_directory_uri( $stylesheet_dir_uri ) {
	return $stylesheet_dir_uri . '/build';
}
add_filter( 'stylesheet_directory_uri', __NAMESPACE__ . '\adjust_stylesheet_directory_uri', 10, 1 );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since 0.4.0
 *
 * @param string[] $classes Classes for the body element.
 * @return string[] The modifed body element classes array.
 */
function body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds classes to indicate whether sidebars are present.
	if ( is_active_sidebar( 'sidebar-main' ) ) {
		$classes[] = 'has-sidebar-main';
	}
	if ( is_active_sidebar( 'sidebar-footer' ) ) {
		$classes[] = 'has-sidebar-footer';
	}

	return $classes;
}
add_filter( 'body_class', __NAMESPACE__ . '\body_classes' );
