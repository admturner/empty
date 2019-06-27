<?php
/**
 * The post template file
 *
 * This template file displays all single posts by default.
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
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		the_post_navigation();

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

	endwhile;
	?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
