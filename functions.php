<?php

function custom_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function loadmore_get_posts()
{
    $ppp = (isset($_POST["ppp"])) ? ($_POST["ppp"]) : 2;
    $pageNumber = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    header("Content-Type: text/html");
    $args = array(
        'suppress_filters'  => true,
        'post_type'         => 'our-services',
        'posts_per_page'    => $ppp,
        'paged'             => $pageNumber,
        'order'             =>  'ASC',
        'post_status' =>  'publish'
    );
    $postslist = new WP_Query($args);
    if ($postslist->have_posts()) : while ($postslist->have_posts()) : $postslist->the_post(); ?>
            <div id="post-<?php the_ID(); ?>" class="item__service ">
                <div class="item__text">
                    <a href="<?= get_permalink(); ?>" class="title"><?= the_title(); ?></a>
                    <p>
                        <?= the_excerpt() ?>
                    </p>
                </div>
                <div class="item__img">
                    <?= the_post_thumbnail('service-image') ?>
                </div>
            </div>
        <?php
        endwhile;
    endif;
    wp_reset_postdata();
    die();
}

add_action('wp_ajax_nopriv_loadmore_get_posts', 'loadmore_get_posts');
add_action('wp_ajax_loadmore_get_posts', 'loadmore_get_posts');


function more_post_ajax()
{
    $ppp = (isset($_POST["ppp"])) ? ($_POST["ppp"]) : 0;
    $pageNumber = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    header("Content-Type: text/html");
    $args = array(
        'suppress_filters'  => true,
        'post_type'         => 'post',
        'posts_per_page'    => $ppp,
        'paged'             => $pageNumber,
        'order'             =>  'ASC',
        'post_status' =>  'publish'
    );
    $postslist = new WP_Query($args);
    if ($postslist->have_posts()) : while ($postslist->have_posts()) : $postslist->the_post();
        ?>
            <div data-id="<?= $postslist->post->ID; ?>" class="col-md-4 best-works__item-wrapper" <?php post_class(); ?>>
                <a href="<?= get_permalink(); ?>" class="best-item">
                    <div class="best-item__img-wrapper">
                        <?= the_post_thumbnail('homepage-thumb') ?>
                    </div>
                    <div class="best-item__content">
                        <div class="address-line" title="<?= the_title(); ?>"><?= the_title(); ?></div>
                        <div class="best-item__desc"><?= the_excerpt(); ?></div>
                    </div>
                </a>
            </div>
<?php
        endwhile;
    endif;
    wp_reset_postdata();
    die();
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');



function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menu_link_class($atts, $item, $args)
{
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);




function wood_scripts()
{
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/script.js', ['jquery'], true);
    wp_enqueue_script('second-script',    get_template_directory_uri() . '/js/main.js',   ['jquery'], true);

    wp_localize_script('second-script', 'wood', array('ajax_url' => admin_url('admin-ajax.php')));


    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', [], '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'wood_scripts');


add_action("wp_ajax_loadmore", "load_more_posts");
add_action("wp_ajax_nopriv_loadmore", "load_more_posts");


add_action('wp_ajax_wood_loadmore_ajax_handler', 'wood_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_wood_loadmore_ajax_handler', 'wood_loadmore_ajax_handler');
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
};

add_action('after_setup_theme', 'wood_setup');
function wood_setup()
{
    register_nav_menu("menu-header", "Menu Header");


    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('post_excerpt');

    add_image_size('homepage-thumb', 360, 200);
    add_image_size('homepage-slider', 395, 220);
    add_image_size('service-image', 270, 254);
}

add_action("init", "wood_registration_types");
function wood_registration_types()
{
    register_post_type('our-services', [
        'labels' => [
            'name'               => 'Services',
            'singular_name'      => 'Service',
            'add_new'            => 'Add new Service',
            'add_new_item'       => 'Add new Service',
            'edit_item'          => 'Edit Service',
            'new_item'           => 'New Service',
            'view_item'          => 'Watch Services',
            'search_items'       => 'Search Service',
            'not_found'          => 'Not found',
            'not_found_in_trash' => 'Not found in bin',
            'parent_item_colon'  => '',
            'menu_name'          => 'Services',
        ],
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-admin-tools',
        'hierarchical'        => false,
        'supports'            => ['title', 'editor', 'author', 'thumbnail', 'excerpt'],
        'has_archive' => true
    ]);

    register_post_type('our-projects', [
        'labels' => [
            'name'               => 'Projects',
            'singular_name'      => 'Project',
            'add_new'            => 'Add new Project',
            'add_new_item'       => 'Add new Project',
            'edit_item'          => 'Edit Project',
            'new_item'           => 'New Project',
            'view_item'          => 'Watch Projects',
            'search_items'       => 'Search Project',
            'not_found'          => 'Not found',
            'not_found_in_trash' => 'Not found in bin',
            'parent_item_colon'  => '',
            'menu_name'          => 'Projects',
        ],
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-admin-tools',
        'hierarchical'        => false,
        'supports'            => ['title', 'editor', 'author', 'thumbnail',  'excerpt'],
        'taxonomies'         => array('category', 'post_tag'),
        'has_archive' => true
    ]);

    register_post_type('professionals', [
        'labels' => [
            'name'               => 'Professionals',
            'singular_name'      => 'Professional',
            'add_new'            => 'Add new Professional',
            'add_new_item'       => 'Add new Professional',
            'edit_item'          => 'Edit Professional',
            'new_item'           => 'New Professional',
            'view_item'          => 'Watch Professional',
            'search_items'       => 'Search Professional',
            'not_found'          => 'Not found',
            'not_found_in_trash' => 'Not found in bin',
            'parent_item_colon'  => '',
            'menu_name'          => 'Professionals',
        ],
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-admin-tools',
        'hierarchical'        => false,
        'supports'            => ['title', 'thumbnail', 'excerpt'],
        'has_archive' => true
    ]);
}

?>