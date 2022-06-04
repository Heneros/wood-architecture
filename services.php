<?php


/**
 * 
 * Template Name: Services
 * 
 */
get_header();
?>



<section class="our-services">
    <div class="container">
        <div class="text__our-services">
            <h1><?= the_title() ?></h1>
            <p>
                <?php the_content(); ?>
            </p>
        </div>
        <form class="field__search" method="GET">
            <!-- <input type="text" autocomplete="of" name="search" placeholder="Search" id="search"> -->
            <input type="search" name="search" id="search__input" placeholder="Find service">
        </form>
        <?php


        ?>
        <div id="ajax-posts" class="row ajax-posts items__service">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
            $postsPerPage = 4;
            $postOffset = $paged * $postsPerPage;

            $args = array(
                'post_type'         => 'our-services',
                'posts_per_page' => $postsPerPage,
                'offset'            => $postOffset,
                'orderby'           => 'post_date',
                'order'             => 'DESC'
            );
            $all_posts = new WP_Query(['post_type' => 'our-services']);
            $countPosts = $all_posts->post_count;
            // echo $countPosts;
            wp_reset_postdata();
            $postList = new WP_Query($args);
            if ($postList->have_posts()) :
                while ($postList->have_posts()) :
                    $postList->the_post();
            ?>
                    <div class="item__service " data-id="<?= $postList->post->ID; ?>">
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
            <?php endwhile;
            endif; ?>
        </div>
        <?php
        wp_reset_postdata();
        global $wp_query;
        $paged = get_query_var('paged') ? get_query_var('paged') : 0;
        $max_pages = $wp_query->max_num_pages;
        $published_posts = wp_count_posts()->publish;
        $posts_per_page = get_option('posts_per_page');
        $page_number_max = ceil($published_posts / $posts_per_page);
        if ($paged < $page_number_max) :
        ?>

            <a id="more_posts" class="load__more" href="#!">Load More</a>
            <!-- <a href="#!" class="load__more <?= $countPosts > $postsPerPage ? 'hidden' : '' ?>" id="more_posts">Load More</a> -->
        <?php
        endif;
        // get_template_part('loadmore');
        ?>
    </div>
    <!-- 
    <a class="load__more">
        Load More
    </a> -->

    </div>
</section>
<script>
    var ppp = 4;
    var pageNumber = 1;


    function load_posts() {
        pageNumber++;
        var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax_service';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: wood.ajax_url,

            data: str,
            beforeSend: function(xhr, data) {
                // $("#more_posts").show();
                $("#more_posts").hide();
            },
            success: function(data) {
                var $data = $(data);
                if ($data.length) {
                    $("#ajax-posts").append($data);
                    $("#more_posts").show();
                    // $("#more_posts").hide();
                } else {

                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }

    $("#more_posts").on("click", function(e, data) {
        var $data = $(data);
        e.preventDefault();
        load_posts();
        $("#ajax-posts").append($data);
        $("#more_posts").attr("disabled", false);
        $(this).insertAfter('#ajax-posts');
    });
</script>
<?php

get_footer();

?>