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
        <form class="field__search">
            <!-- <input type="text" autocomplete="of" name="search" placeholder="Search" id="search"> -->
            <input type="search" name="search" id="search" placeholder="search">

        </form>
        <div class="results-search" id="results-search"></div>
        <?php

        $query = new WP_Query([
            'post_type' => 'our-services',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'title',
        ]);

        if ($query->have_posts()) :
        ?>
            <div id="items__service" class="row">
                <?php
                while ($query->have_posts()) :
                    $query->the_post();
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
                <?php endwhile; ?>
            </div>
        <?php endif;
        wp_reset_postdata();
        ?>
    </div>
    <a class="load__more">
        Load More
    </a>
    </div>
</section>
<?php

get_footer();

?>