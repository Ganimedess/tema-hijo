<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function twentytwentyfour_child_enqueue_assets() {
    // Cargar el CSS del tema padre
    wp_enqueue_style('twentytwentyfour-style', get_template_directory_uri() . '/style.css');

    // Cargar el CSS del tema hijo
    wp_enqueue_style('twentytwentyfour-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('twentytwentyfour-style')
    );

    // Cargar la segunda hoja de estilo 'estilos.css' desde la carpeta /css
    wp_enqueue_style('twentytwentyfour-child-estilos', 
        get_stylesheet_directory_uri() . '/css/estilos.css', 
        array('twentytwentyfour-child-style') // Dependencia de 'twentytwentyfour-child-style'
    );

    // Cargar el script del tema hijo
    wp_enqueue_script('twentytwentyfour-child-script', 
        get_stylesheet_directory_uri() . '/js/script.js', 
        array(), 
        null, 
        true // Cargar en el footer
    );
}
add_action('wp_enqueue_scripts', 'twentytwentyfour_child_enqueue_assets');
