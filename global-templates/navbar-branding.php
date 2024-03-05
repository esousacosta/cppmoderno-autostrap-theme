<?php
/**
 * Navbar branding
 *
 * @package Understrap
 * @since 1.2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! has_custom_logo() ) { ?>

	<?php if ( is_front_page() && is_home() ) : ?>

		<h1 class="navbar-brand mb-0">
			<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
				<?php bloginfo( 'name' ); ?>
			</a>
		</h1>

	<?php else : ?>

		<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
			<?php bloginfo( 'name' ); ?>
		</a>

	<?php endif; ?>

	<?php
} else {
	?>
	<div class="site-branding">
		<div class="custom-logo">
		<?php
		the_custom_logo();
		?>
		</div>
		<?php
		if ( is_front_page() && is_home() ) :
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
		else :
			?>
			<div class="site-branding-text">
			<p class="site-title"><a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
		endif;
		$cppmoderno_description = get_bloginfo( 'description', 'display' );
		if ( $cppmoderno_description || is_customize_preview() ) :
			?>
			<p class="site-description"><?php echo $cppmoderno_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			</div>
		<?php endif; ?>
	</div><!-- .site-branding -->

	<nav id="site-navigation" class="navbar navbar-expand-lg main-navigation">
		<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'cppmoderno' ); ?></button> -->
		<?php
		// Need to add the nav-item class to the lis,
		// and the nav-link class to the a tags
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'conatiner' => 'div',
				'container_class' => 'collapse navbar-collapse',
				'menu' => 'Navigation bar',
				'menu_id'        => 'primary-menu',
				'menu_class' => 'navbar-nav menu',

			)
		);
		?>
	</nav><!-- #site-navigation -->
<?php 
}