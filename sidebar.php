<?php
/**
 * The sidebar (widgets) template file
 *
 * This template file displays the main widget area if the sidebar is active.
 *
 * @package bream
 *
 * @since 0.4.0
 */

// Return early if the main sidebar isn't active.
if ( ! is_active_sidebar( 'sidebar-main' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-main' ); ?>
</aside>
