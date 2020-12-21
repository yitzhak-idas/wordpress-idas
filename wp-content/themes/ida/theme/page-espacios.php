<?php

$context = Timber::context();

$cats = get_categories();


$args = array(
        'post_type' => 'post',
        'cat' => 4,    
        'posts_per_page' => 3, 
);

$events = query_posts($args); 

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
$context['categories'] = $cats;
$context['events'] = $events;
Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );