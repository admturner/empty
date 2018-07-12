<?php
/**
 * This template displays the global site footer
 *
 * @package Bream
 *
 * @since 0.3.0
 */
?>

	<footer id="colophon" class="site-footer">
		<section class="site-info">
			<?php
			/* translators: 1: Theme URL, 2: THeme name, 3: CMS name. */
			printf( wp_kses_post( __( '<a href="%1$s">%2$s</a> theme, built on <a href="%3$s">%4$s</a>', 'bream' ) ),
				esc_url( __( 'https://github.com/admturner/bream', 'bream' ) ),
				'Bream',
				esc_url( __( 'https://wordpress.org/', 'bream' ) ),
				'WordPress'
			);
			?>
		</section><!-- .site-info -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
