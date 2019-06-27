<?php
/**
 * The archive page template file
 *
 * This template file displays aggregated lists of single posts.
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
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header>

		<?php
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the template for the content.
			 *
			 * You can override this in a child theme if want. Add a file
			 * called content-{post-type-name}.php and that'll be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_type() );

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
