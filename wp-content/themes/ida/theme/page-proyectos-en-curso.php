<?php

$context = Timber::context();


$args = array(
    'post_type' => 'proyecto',
    'cat' => 11,
);

$current = Timber::get_posts($args);; 


$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
$context['current'] = $current;
Timber::render(array('page-' . $timber_post->post_name . '.twig', 'page.twig'), $context);
