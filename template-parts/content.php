<?php
/**
 * The template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bream
 *
 * @since 0.4.0
 */

use Bream\Includes\TemplateTags;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title(
				sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>'
			);
		}

		if ( is_single() ) {
			TemplateTags\entry_meta(
				array(
					'before' => '<div class="entry-meta">',
					'after'  => '</div>',
				)
			);
		}
		?>
	</header>

	<?php TemplateTags\post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bream' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bream' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<?php
	if ( get_edit_post_link() ) {
		?>
		<footer class="entry-footer">
			<?php TemplateTags\entry_footer(); ?>
		</footer>
		<?php
	}
	?>
</article>
