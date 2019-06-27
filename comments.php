<?php
/**
 * The comments template file
 *
 * This template displays the comments section of the page, with both the
 * posted comments and the comment submission form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bream
 *
 * @since 0.4.0
 */

get_header();

// Return if the post is password protected and the user hasn't entered it.
if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="<?php comments_open() ? esc_attr_e( 'comments-area', 'bream' ) : esc_attr_e( 'comments-area comments-closed', 'bream' ); ?>">
	<?php
	if ( have_comments() ) :
		$bream_comment_count = get_comments_number();
		?>
		<h2 class="comments-title">
			<?php
			printf(
				/* translators: 1: comment count number, 2: title */
				esc_html( _nx( '%1$s comment on %2$s', '%1$s comments on %2$s', $bream_comment_count, 'comments section title', 'bream' ) ),
				number_format_i18n( $bream_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'<span>' . get_the_title() . '</span>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			);
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation();

		// Leave a note if further commenting has been closed.
		if ( ! comments_open() ) {
			printf( '<p class="commenting-closed">%s</p>', esc_html__( 'Commenting is closed.', 'bream' ) );
		}
	endif;

	comment_form();
	?>
</section>
