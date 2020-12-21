<?php
$context = Timber::context();
$timber_post     = new Timber\Post();

$cats = get_categories(array(
    'exclude' => '11,12',
));

$news = get_field('news', $timber_post->id);



$stickyList = get_option('sticky_posts');


if($stickyList) {
    $context['sticky'] = new Timber\Post(end($stickyList));
}



$context['news'] = $news;
$context['post'] = $timber_post;
$context['categories'] = $cats;

$context['posts'] = Timber::get_posts(array('post_type' => 'post', 'ignore_sticky_posts' => 1));
Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );