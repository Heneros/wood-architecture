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
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
        $postsPerPage = 4;
        $postOffset = $paged * $postsPerPage;
        $args = array(
            'post_type'         => 'our-services',
            'offset' => $postOffset,
            'posts_per_page' =>   $postsPerPage,
            
            // 'order' => 'ASC',
            // 'orderby' => 'title',
            // 'post_status' => 'publish'
        );
        $postList = new WP_Query($args);
        if ($postList->have_posts()) :
        ?>
            <div id="items__service" class="row items__service">
                <?php
                while ($postList->have_posts()) :
                    $postList->the_post();
                ?>
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
                <?php endwhile; ?>
            </div>

        <?php endif;
        wp_reset_postdata();
        ?>
    </div>
    <!-- 
    <a class="load__more">
        Load More
    </a> -->
    <?php
    get_template_part('loadmore');
    ?>
    </div>
</section>
<script>
    var ppp = 2;
    var pageNumber = 1


    function load_posts_services() {
        pageNumber++;
        var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=loadmore_get_posts';

        $.ajax({
            type: "POST",
            dataType: "html",
            url: wood.ajax_url,

            data: str,
            beforeSend: function(xhr, data) {
                var $data = $(data);

                $("#more_posts").show();
            },
            success: function(data, response) {
                var $data = $(data);
             
                console.log($data);
                if ($data.length) {
                    $(".items__service").append($data);
                    $("#more_posts").hide();


                } else {
                    // $("#more_posts").hide();

                }
            },

            error: function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
        return false;
    }
    $("#more_posts").on("click", function(e) {
        e.preventDefault();
        // $("#more_posts").attr("disabled", true);
        load_posts_services();
    });
</script>
<?php

get_footer();

?>