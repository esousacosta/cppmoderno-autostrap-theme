<?php
/**
 * The category template file, to display the posts main categories (C++, Leetcode etc.)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
$current_page_slug = get_query_var('pagename');
$isCategoryPage = is_category(  );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<?php
			// Do the left sidebar check and open div#primary.
			get_template_part( 'global-templates/left-sidebar-check' );
			?>

			<main class="site-main <?php if($isCategoryPage) : echo "posts-main"; endif;?>" id="main">
				<?php
				if ( have_posts() ) {
					// Start the Loop.
					while ( have_posts() ) {
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
                        get_template_part('loop-templates/content', 'posts');
					}
				} else {
					get_template_part( 'loop-templates/content', 'none' );
				}
				?>

			</main>

			<?php
			// Display the pagination component.
			understrap_pagination();

			// Do the right sidebar check and close div#primary.
			if (!$isCategoryPage) {
				get_template_part( 'global-templates/right-sidebar-check' );
			}
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
