<?php

/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="card post-card">

        <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>

        <div class="card-body">

            <div class="card-title">
                <header class="entry-header">

                <!-- Experimenting with the card's content -->
                <div>
                    <?php understrap_categories_list();?>
                </div>

                    <?php
                    the_title(
                        sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
                        '</a></h2>'
                    );
                    ?>

                    <?php if ('post' === get_post_type()) : ?>

                        <div class="entry-meta">
                            <?php understrap_posted_on(); ?>
                        </div><!-- .entry-meta -->

                    <?php endif; ?>

                </header><!-- .entry-header -->
            </div><!-- .card-title -->
            <div class="entry-content card-text">

                <?php
                // the_excerpt();
                understrap_link_pages();
                ?>

            </div><!-- .entry-content -->

            <footer class="entry-footer">

                <?php understrap_entry_footer(); ?>

            </footer><!-- .entry-footer -->

        </div><!-- .card-body -->
    </div><!-- .card -->
</article><!-- #post-<?php the_ID(); ?> -->