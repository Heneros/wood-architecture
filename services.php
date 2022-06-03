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
        <div id="ajax-posts" class="row ajax-posts">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
            $postOffset = $paged * $postsPerPage;
            $postsPerPage = 4;
            $args = array(
                'post_type'         => 'our-services',
                'posts_per_page' => $postsPerPage,
            );
            wp_reset_postdata();
            $postList = new WP_Query($args);
            if ($postList->have_posts()) :
                while ($postList->have_posts()) :
                    $postList->the_post();
            ?>
                    <div class="item__service ">
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
        ?>
        <!-- <div class="load__more" id="more_posts">Load More</div> -->
        <?php
        get_template_part('loadmore');
        ?>
    </div>
    <!-- 
    <a class="load__more">
        Load More
    </a> -->

    </div>
</section>
<script>
    var ppp = 2; 
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
                $("#more_posts").show();
            },
            success: function(data) {
                var $data = $(data);
                if ($data.length) {
                    $("#ajax-posts").append($data);

                    $("#more_posts").hide();
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