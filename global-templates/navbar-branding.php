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

	<?php
	get_template_part('/parts/search-form');
	?>

	<nav id="site-navigation" class="navbar navbar-expand-lg main-navigation">
		<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'cppmoderno' ); ?></button> -->
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'conatiner' => 'div',
				'container_class' => 'collapse navbar-collapse',
				'container_id' => 'navbarNavDropdown',
				'menu' => 'Navigation bar',
				'menu_id'        => 'primary-menu',
				'menu_class' => 'navbar-nav menu',
				'add_li_class' => 'nav-item',
				'add_link_class' => 'nav-link'
			)
		);
		get_template_part('/parts/dropdown');
		?>
	</nav><!-- #site-navigation -->
<?php 
}