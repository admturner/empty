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
		<?php
		if ( is_active_sidebar( 'sidebar-footer' ) ) {
			?>
			<aside id="secondary" class="widget-area">
				<?php dynamic_sidebar( 'sidebar-footer' ); ?>
			</aside>
			<?php
		}
		?>
		<section class="site-info">
			<?php
			printf(
				'<a href="%1$s">%2$s</a> %3$s <a href="%4$s">%5$s</a>.',
				esc_url( 'https://github.com/admturner/bream' ),
				'Bream',
				esc_html__( 'theme, built on', 'bream' ),
				esc_url( __( 'https://wordpress.org/', 'bream' ) ),
				'WordPress'
			);
			?>
		</section><!-- .site-info -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
