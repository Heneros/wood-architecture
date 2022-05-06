<?php

function wood_scripts(){
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/script.js', ['jquery'], true);

    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', [], '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'wood_scripts');

function wood_setup(){
	add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

?>