<?php

$context = Timber::context();

$cats = get_categories();

$banner = get_field('home_banner_1_img');
$banner2 = get_field('home_banner_2_img');


$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
$context['categories'] = $cats;
$context['banner'] = $banner;
$context['banner2'] = $banner2;
$context['posts'] = Timber::get_posts(array('post_type' => 'post', 'post__in' => get_option('sticky_posts'), 'posts_per_page' =>3, 'order' => 'ASC'));
Timber::render('front-page.twig', $context);
