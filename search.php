<?php
/**
 * The search results template file
 *
 * This is the template file that displays the search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bream
 *
 * @since 0.4.0
 */

get_header();
?>
	<main id="main" class="content-main">

	<?php
	if ( have_posts() ) {
		?>
		<header class="page-header">
			<h1 class="page-title">
				<?php
				printf(
					/* translators: %s: the search query */
					esc_html__( '%s Search Results', 'bream' ),
					'<span>' . get_search_query() . '</span>'
				);
				?>
			</h1>
		</header>
		<?php

		while ( have_posts() ) :
			the_post();

			/*
			 * Include the template for the search content.
			 *
			 * You can override this in a child theme if want. Add a file
			 * called content-search.php and that'll be used instead.
			 */
			get_template_part( 'template-parts/content', 'search' );
		endwhile;

		the_posts_navigation();

	} else {

		get_template_part( 'template-parts/content', 'none' );

	}
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
