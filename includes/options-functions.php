<?php
/**
 * Functions to handle theme options and settings.
 *
 * @package Bream
 * @since 0.4.0
 */
namespace Bream\Includes\OptionsFunctions;

/**
 * Create Bream options and set their default values.
 *
 * @since 0.4.0
 *
 * @param array $options Optional. Custom option $key => $value pairs to create. Default empty array.
 */
function populate_default_options( $options = array() ) {
	$defaults = array(
		'small_size_w' => 200,
		'small_size_h' => 200,
	);

	$options = wp_parse_args( $options, $defaults );

	foreach ( $options as $option => $value ) {
		if ( false === get_option( $option ) ) {
			add_option( $option, $value, true );
		}
	}
}
add_action( 'admin_init', __NAMESPACE__ . '\populate_default_options' );

/**
 * Sets up Bream settings pages and fields and registers settings.
 *
 * @see https://codex.wordpress.org/Settings_API Documentation on the WordPress settings API.
 *
 * @since 0.4.0
 */
function options_setup() {
	// Add "Small size" field to the media options form and register output callback.
	add_settings_field(
		'small_size',
		__( 'Small size', 'bream' ),
		__NAMESPACE__ . '\media_options_small_callback',
		'media',
		'default'
	);

	// Register the settings so they get saved automatically by WordPress.
	register_setting( 'media', 'small_size_w', 'integer' );
	register_setting( 'media', 'small_size_h', 'integer' );
}
add_action( 'admin_init', __NAMESPACE__ . '\options_setup' );

/**
 * Displays the small size media options form fields.
 *
 * @since 0.4.0
 */
function media_options_small_callback() {
	?>
	<fieldset>
		<legend class="screen-reader-text"><span><?php _e( 'Small size', 'bream' ); ?></span></legend>
		<label for="small_size_w"><?php _e( 'Max Width', 'bream' ); ?></label>
		<input name="small_size_w" type="number" step="1" min="0" id="small_size_w" value="<?php form_option( 'small_size_w' ); ?>" class="small-text" />
		<br />
		<label for="small_size_h"><?php _e( 'Max Height', 'bream' ); ?></label>
		<input name="small_size_h" type="number" step="1" min="0" id="small_size_h" value="<?php form_option( 'small_size_h' ); ?>" class="small-text" />
	</fieldset>
	<?php
}

/**
 * Adds the small size option to the media library selector.
 *
 * @since 0.4.0
 *
 * @param array $sizes
 * @return array $sizes
 */
function update_media_size_names_choose( $sizes ) {
	return array_merge(
		$sizes,
		array( 'size-small' => __( 'Small', 'bream' ) )
	);
}
add_filter( 'image_size_names_choose', __NAMESPACE__ . '\update_media_size_names_choose' );
