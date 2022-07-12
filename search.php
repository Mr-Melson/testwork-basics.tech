<?php

/**
 * Search template file.
 *
 * @package Understrapchild\Template
 */

get_header();

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$product_args = array(
	'post_type' => 'product',
	'post_status' => 'publish',
    'paged' => $paged,
    's' => $_GET['s']
);

$product_query = new WP_Query( $product_args );

$news_args = array(
	'post_type' => 'news',
	'post_status' => 'publish',
    'paged' => $paged,
    's' => $_GET['s']
);

$news_query = new WP_Query( $news_args );

$all_count = $product_query->found_posts + $news_query->found_posts;
$max_num_pages = $product_query->max_num_pages;
if( $max_num_pages < $news_query->max_num_pages ){
    $max_num_pages = $news_query->max_num_pages;
}

get_footer();
