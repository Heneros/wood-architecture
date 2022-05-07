<?php


function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
      $atts['class'] = $args->link_class;
    }
    return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );




function wood_scripts(){
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/script.js', ['jquery'], true);

    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', [], '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'wood_scripts');



if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
};

add_action('after_setup_theme', 'wood_setup');
function wood_setup() {
    register_nav_menu("menu-header", "Menu Header");


    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
    

?>