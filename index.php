<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme. It displays any
 * page when no more specific template matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bream
 *
 * @since 0.3.0
 */
get_header();
?>
	<main id="main" class="content-main">

	<?php
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) {
			?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
			<?php
		}

		while ( have_posts() ) :
			the_post();

			//get_template_part( 'template-parts/content', get_post_type() );

		endwhile;

		the_posts_navigation();

	endif;
	?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
