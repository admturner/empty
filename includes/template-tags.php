<?php
/**
 * Custom template tags for the Bream theme
 *
 * @package Bream
 * @since 0.4.0
 */

namespace Bream\Includes\TemplateTags;

/**
 * Displays HTML with entry meta information for the current post.
 *
 * @since 0.4.0
 *
 * @param array $args {
 *     Entry meta HTML arguments. Optional.
 *
 *     @type string   $before Markup to prepend the entry meta block. Default empty.
 *     @type string   $after  Markup to append the entry meta block. Default empty.
 *     @type bool     $echo   Whether to echo or return the entry meta HTML. Default true for echo.
 *     @type WP_Post  $post   Current post object to retrieve the entry meta for.
 *     @type string[] $fields Array of meta field => value pairs for each piece of meta to show.
 * }
 * @return string|void HTML string when echo is false.
 */
function entry_meta( $args = array() ) {
	$defaults = array(
		'before' => '',
		'after'  => '',
		'echo'   => true,
		'post'   => get_post(),
		'fields' => array(
			'time_string' => posted_on( false ),
			'byline'      => posted_by( false ),
		),
	);
	$a        = wp_parse_args( $args, $defaults );

	/**
	 * Filters the fields output in the post entry meta section.
	 *
	 * @since 0.4.0
	 *
	 * @param string[] $a['fields'] An array of HTML strings to output in the post meta.
	 */
	$fields = apply_filters( 'bream_entry_meta_fields', $a['fields'] );

	if ( ! $fields ) {
		return;
	}

	$entry_meta = '';
	foreach ( $fields as $field ) {
		$entry_meta .= $field;
	}

	if ( $a['echo'] ) {
		echo wp_kses_post( $a['before'] . $entry_meta . $a['after'] );
	} else {
		return $entry_meta;
	}
}

/**
 * Displays HTML with entry footer information for the current post.
 *
 * Includes meta information for categories, tags, and comments.
 *
 * @since 0.4.0
 */
function entry_footer() {
	// Don't show categories and tags on pages.
	if ( is_single() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'bream' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories */
			printf( '<p class="cat-links">' . esc_html__( 'Categorized: %1$s', 'bream' ) . '</p>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'bream' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags */
			printf( '<p class="tags-links">' . esc_html__( 'Tagged: %1$s', 'bream' ) . '</p>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}

	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'bream' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}

/**
 * Displays HTML with meta information for the post date and time.
 *
 * @since 0.4.0
 *
 * @param bool $echo Whether to echo or return the meta HTML. Default true for echo.
 */
function posted_on( $echo = true ) {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html_x( 'Posted on %s', 'post date', 'bream' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	if ( $echo ) {
		printf( '<span class="posted-on">%s</span>', $posted_on ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	} else {
		return $posted_on;
	}
}

/**
 * Displays HTML with meta information for the post author.
 *
 * @since 0.4.0
 *
 * @param bool $echo Whether to echo or return the meta HTML. Default true for echo.
 */
function posted_by( $echo = true ) {
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'By %s', 'post author', 'bream' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	if ( $echo ) {
		printf( '<span class="byline">%s</span>', $byline ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	} else {
		return $byline;
	}
}

/**
 * Displays HTML for an optional post thumbnail image.
 *
 * Wraps the post thumbnail in an anchor element container on archive views, or
 * a div element on single views.
 *
 * @since 0.4.0
 */
function post_thumbnail() {
	// Return early on password-protected posts, attachment pages, or if no image.
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) {
		?>
		<figure class="article-thumbnail">
			<?php the_post_thumbnail( 'large' ); ?>
		</figure>
		<?php
	} else {
		?>
		<figure class="article-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			</a>
		</figure>
		<?php
	}
}
