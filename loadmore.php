<?php
global $wp_query;
$paged = get_query_var('paged') ? get_query_var('paged') : 0;
$max_pages = $wp_query->max_num_pages;
$published_posts = wp_count_posts()->publish;
$posts_per_page = get_option('posts_per_page');
$page_number_max = ceil($published_posts / $posts_per_page);

if ($paged < $page_number_max) :
?>
    <div style="text-align: center;" class="best-works__botton-wrapper">
        <a id="more_posts" href="#" data-max_pages="<?php echo $page_number_max; ?>" data-paged="<?php echo $paged; ?>" data-taxonomy="<?php echo is_category() ? 'category' : get_query_var('taxonomy'); ?>" data-term_id="<?php echo get_queried_object_id(); ?>" data-pagenumlink="<?php echo get_pagenum_link(1); ?>" class="button">
            Load more
        </a>
    </div>
<?php

endif;
?>