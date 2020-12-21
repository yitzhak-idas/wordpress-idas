<?php

$context = Timber::context();

$preguntas = get_field('links_0_pregunta');
$nombre = get_field('nombre');

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
$context['preguntas'] = $preguntas;
$context['nombre'] = $nombre;
Timber::render(array('page-' . $timber_post->post_name . '.twig', 'page.twig'), $context);
