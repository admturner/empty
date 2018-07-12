<?php
/**
 * The Bream header template
 *
 * This template displays all of the `<head>` section and the global site
 * header.
 *
 * @package Bream
 *
 * @since 0.3.0
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			printf( '<%1$s class="site-title"><a href="%2$s" rel="home">%3$s</a></%1$s>',
				( is_front_page() ) ? 'h1' : 'p',
				esc_url( home_url( '/' ) ),
				esc_html( get_bloginfo( 'name' ) )
			);

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo esc_html( $description ); ?></p>
				<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'bream' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'site-nav',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
