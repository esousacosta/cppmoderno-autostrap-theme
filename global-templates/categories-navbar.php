<?php

/**
 * Navbar dedicated to the categories of the website.
 * Ideally present on every page.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<div class="categories-navbar container">
    <div class="carousel-view">
        <div id="prev-cat-btn" class="prev-btn">
            «
        </div>
        <div id="cat-item-list" class="item-list">
            <?php
            $categories = get_categories(array(
                'orderby' => 'count',
                'order'   => 'DESC'
            ));

            foreach ($categories as $category) {
                $category_link = sprintf(
                    '<a href="%1$s" alt="%2$s">%3$s</a>',
                    esc_url(get_category_link($category->term_id)),
                    esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)),
                    esc_html($category->name)
                );

                // echo '<p>' . sprintf( esc_html__( 'Category: %s', 'textdomain' ), $category_link ) . '</p> ';
                echo '<div class="cat-item">' . sprintf(esc_html__('%s', 'textdomain'), $category_link) . '</div> ';
                // echo '<p>' . sprintf( esc_html__( 'Description: %s', 'textdomain' ), $category->description ) . '</p>';
                // echo '<p>' . sprintf( esc_html__( 'Post Count: %s', 'textdomain' ), $category->count ) . '</p>';
            }
            ?>
        </div>
        <div id="next-cat-btn" class="next-btn">
            »
        </div>
    </div>
</div>
<script type="text/javascript">
    const prev = document.getElementById('prev-cat-btn')
    const next = document.getElementById('next-cat-btn')
    const list = document.getElementById('cat-item-list')
    const itemWidthInPx = 150
    const paddingInPx = 4

    prev.addEventListener('click', () => {
        list.scrollLeft -= (itemWidthInPx + paddingInPx)
    })
    next.addEventListener('click', () => {
        list.scrollLeft += (itemWidthInPx + paddingInPx)
    })
</script>