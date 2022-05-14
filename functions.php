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
    wp_enqueue_script('second-script',    get_template_directory_uri() . '/js/main.js',   ['jquery'], true);

    wp_localize_script('second-script', 'wood', array('ajax_url' => admin_url('admin-ajax.php')));


    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', [], '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'wood_scripts');


add_action("wp_ajax_loadmore", "load_more_posts");
add_action("wp_ajax_nopriv_loadmore", "load_more_posts");



function load_more_posts(){
    $paged = !empty($_POST['paged']) ? $_POST['paged'] : 1;
    $paged++;

   $args = array(
       'paged' => $paged,
       'post_status' => 'publish'
   );

   $taxonomy = !empty($_POST['taxonomy']) ? $_POST['taxonomy'] : '';
   $term_id  = !empty($_POST['term_id']) ? $_POST['term_id'] : '';

   if($taxonomy && $term_id){
       $args['tax_query'] = array(
           array(
               'taxonomy' => $taxonomy,
               'terms'    => $term_id
           )
           );
   }

   query_posts($args);
   ob_start();
   $query = new WP_Query([
    'post_type' => 'post',
    'order' => 'ASC'
]);
if($query->have_posts()):
while ($query->have_posts()):
   $query->the_post();
   get_template_part('theme-parts/content-article');
   endwhile;
endif;
   die();


}

add_action('wp_ajax_wood_loadmore_ajax_handler', 'wood_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_wood_loadmore_ajax_handler', 'wood_loadmore_ajax_handler');
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
    add_theme_support('post_excerpt');

    add_image_size( 'homepage-thumb', 360, 200 ); 
}
    

// function wood_load_more_script(){
//     global $wp_query;
//     wp_enqueue_script('jquery');
//     wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/main.js', array('jquery') );

//     wp_localize_script('my_loadmore', 'wood_loadmore_params', array(
//         'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', 
// 		'posts' => json_encode( $wp_query->query_vars ), 
// 		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
// 		'max_page' => $wp_query->max_num_pages
//     ));
//     wp_enqueue_script('my_loadmore');
// }
// add_action("wp_enqueue_scripts", "wood_load_more_script");


// function wood_loadmore_ajax_handler(){
//     $args = json_decode(stripslashes($_POST['query']), true);
//     $args['paged'] = $_POST['page'] + 1;
//     $args['post_status'] = 'publish';

//     query_posts($args);

//     if(have_posts()):
//         while(have_posts()) : the_post();
//         get_template_part('theme-parts/content-article', get_post_format());
//     endwhile;
//     endif;
//     die;
// }

// add_action('wp_ajax_loadmore', 'wood_loadmore_ajax_handler');
// add_action('wp_ajax_nopriv_loadmore', 'wood_loadmore_ajax_handler');
?>