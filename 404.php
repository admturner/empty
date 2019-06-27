<?php
/**
 * The 404 (not found) page template file
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bream
 *
 * @since 0.4.0
 */

get_header();
?>
	<main id="main" class="content-main">
		<section class="error-404 page-not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Sorry, we can&rsquo;t find that page.', 'bream' ); ?></h1>
			</header>
			<div class="page-content">
				<p><?php esc_html_e( 'There doesn&rsquo;t seem to be anything at this URL. You could try to search for what you&rsquo;re looking for.', 'bream' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
