<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include popper before bootstrap, for dropdown
// dependencies to work properly.
function add_popper_js() {
	wp_enqueue_script("popper-js", "https://unpkg.com/@popperjs/core@2/dist/umd/popper.js", array());
}

add_action('wp_enqueue_scripts', 'add_popper_js', 3);

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}

function cppmoderno_styles() {
	wp_enqueue_style('cppmoderno-styles', get_template_directory_uri() . "/css/theme.css");
}

// add_action("wp_enqueue_scripts", "cppmoderno_styles");

function add_additional_class_li($classes, $currItem, $args) {
	if (isset($args->add_li_class)) {
		// syntax to add elements to the array
		$classes[] = $args->add_li_class;
	}
	return $classes;
}

function add_menu_link_class($atts, $menuItem, $args) {
	if (isset($args->add_link_class)) {
		$atts['class'] = $args->add_link_class;
	}
	return $atts;
}

add_filter('nav_menu_css_class', 'add_additional_class_li', 1, 3);
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);