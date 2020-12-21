<?php

$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
$context['proyectos'] = Timber::get_posts(array('post_type' => 'proyecto', 'posts_per_page' => 3));

Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );