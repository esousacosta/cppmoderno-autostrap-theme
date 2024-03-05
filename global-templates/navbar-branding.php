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
		<?php
		the_custom_logo();
		if ( is_front_page() && is_home() ) :
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
		else :
			?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
		endif;
		$cppmoderno_description = get_bloginfo( 'description', 'display' );
		if ( $cppmoderno_description || is_customize_preview() ) :
			?>
			<p class="site-description"><?php echo $cppmoderno_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
		<?php endif; ?>
	</div><!-- .site-branding -->

	<nav id="site-navigation" class="main-navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'cppmoderno' ); ?></button>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			)
		);
		?>
	</nav><!-- #site-navigation -->
<?php 
}