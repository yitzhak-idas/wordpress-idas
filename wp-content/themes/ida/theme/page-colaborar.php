<?php

$context = Timber::context();

$link = get_field('colaborar_btn_link_1');
$link2 = get_field('colaborar_btn_link_2');

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
$context['link'] = $link;
$context['link2'] = $link2;
Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );