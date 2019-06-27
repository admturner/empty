<?php
/**
 * The template part for displaying a message that no posts can be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bream
 *
 * @since 0.4.0
 */

?>

<section class="no-results-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'No Results Found.', 'bream' ); ?></h1>
	</header>

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) {
			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'There are no posts yet. Do you want to create the first one? <a href="%1$s">Write a new post</a>.', 'bream' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);
		} elseif ( is_search() ) {
			?>
			<p><?php esc_html_e( 'Nothing matched that search. Please try another with different keywords.', 'bream' ); ?></p>
			<?php
			get_search_form();
		} else {
			?>
			<p><?php esc_html_e( 'Sorry we can&rsquo;t find what you&rsquo;re looking for. Searching for it might help.', 'bream' ); ?></p>
			<?php
			get_search_form();
		}
		?>
	</div>
</section>
