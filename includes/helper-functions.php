<?php
/**
 * Functions that help other functions.
 *
 * @package Bream
 * @since 0.4.0
 */
namespace Bream\Includes\HelperFunctions;

/**
 * Retrieves the Bream theme version.
 *
 * @since 0.4.0
 *
 * @return string|null The version number in semver format or null if the theme is not found.
 */
function get_bream_version() {
	$bream_theme = wp_get_theme();

	return ( ! empty( $bream_theme ) ) ? $bream_theme->get( 'Version' ) : null;
}
