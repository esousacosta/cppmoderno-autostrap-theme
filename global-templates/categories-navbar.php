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
        <button id="prev-cat-btn" class="prev-btn"><svg viewBox="0 0 512 512" width="20" title="chevron-circle-left">
                <path d="M256 504C119 504 8 393 8 256S119 8 256 8s248 111 248 248-111 248-248 248zM142.1 273l135.5 135.5c9.4 9.4 24.6 9.4 33.9 0l17-17c9.4-9.4 9.4-24.6 0-33.9L226.9 256l101.6-101.6c9.4-9.4 9.4-24.6 0-33.9l-17-17c-9.4-9.4-24.6-9.4-33.9 0L142.1 239c-9.4 9.4-9.4 24.6 0 34z" />
            </svg></button>
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
        <button id="next-cat-btn" class="next-btn"> <svg viewBox="0 0 512 512" width="20" title="chevron-circle-right">
                <path d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm113.9 231L234.4 103.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L285.1 256 183.5 357.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L369.9 273c9.4-9.4 9.4-24.6 0-34z" />
            </svg>
        </button>
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