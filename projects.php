<?php

/**
 * 
 * Template Name: Projects
 * 
 */

get_header();

?>

<div class="our__projects">
    <div class="container">
        <div class="row">
            <div class="our__projects-description">
                <h1 class="our__projects-title"> <?php the_title(); ?></h1>
                <p class="our__projects-desc">
                    <?php the_excerpt(); ?>
                </p>
            </div>
        </div>
    </div>
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $query = new WP_Query([
        'post_type' => 'our-projects',
        'paged' => $paged,
        'posts_per_page' => -1
    ]);
    if ($query->have_posts()) :
    ?>
        <div class="blocks__items">
            <?php
            while ($query->have_posts()) :
                $query->the_post();
                $featured_img = get_the_post_thumbnail_url()
            ?>
                <div class="item__image">
                    <div class="hovereffect">
                        <img src="<?= $featured_img; ?>" alt="">

                        <div class="overlay">
                            <div class="info">
                                <span>Atlas </span>
                                <h2><?php the_title(); ?></h2>
                                <a href="<?= get_permalink(); ?>">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    <?php
    endif;
    ?>
</div>
</div>
</div>
<?php
get_footer();

?>