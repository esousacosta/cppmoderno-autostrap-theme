<?php

/**
 * The template for displaying search results pages
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

?>

<div class="wrapper" id="search-wrapper">

	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

		<div class="row">

			<?php
			// Do the left sidebar check and open div#primary.
			get_template_part('global-templates/left-sidebar-check');
			?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					printf(
						/* translators: %s: query term */
						esc_html__('Resultados de busca para: "%s"', 'understrap'),
						'<span>' . get_search_query() . '</span>'
					);
					?>
				</h1>
			</header><!-- .page-header -->

			<!-- To remove the posts-main in case of changing the behaviour back
			to the original one. -->
			<main class="site-main posts-main" id="main">

				<?php if (have_posts()) : ?>


					<?php /* Start the Loop */ ?>
					<?php
					while (have_posts()) :
						the_post();

						/*
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 * I've replaced the content-search template by the
						 * content-posts template to match the behaviour of the archive page
						 */
						get_template_part('loop-templates/content', 'posts');
					endwhile;
					?>

				<?php else : ?>

					<?php get_template_part('loop-templates/content', 'none'); ?>

				<?php endif; ?>

			</main>

			<?php
			// Display the pagination component.
			understrap_pagination();

			// Do the right sidebar check and close div#primary.
			// get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #search-wrapper -->

<?php
get_footer();
