<?php

/**
 * 
 * Template Name: Blog
 * 
 */

get_header();
?>

<section class="blog__company">
    <div class="container">
        <div class="col-md-12">
            <div class="description__main-blog">
                <h1 class="main__blog-title"><?php the_title() ?></h1>
                <p>
                    <?php the_content(); ?>
                </p>
            </div>
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array('posts_per_page' => 6, 'paged' => $paged, 'post_type' => "post",);
            query_posts($args);
            if (have_posts()) :
            ?>
                <div class="main__blog">
                    <?php
                    while (have_posts()) :
                        the_post();
                        $featured_img = wp_get_attachment_image_url(get_post_thumbnail_id());
                    ?>
                        <div class="item__blog">
                            <div class="image__blog">
                                <?= get_the_post_thumbnail(); ?>
                                <div class="date__item-blog"><?= the_date('d-M'); ?></div>
                            </div>
                            <h2 class="title__blog-item"><?= the_title(); ?></h2>
                            <div class="description__blog">
                                <?= the_excerpt(); ?>
                            </div>
                            <a href="<?= get_permalink(); ?>" class="full__story">
                                Full Story
                            </a>
                        </div>
                    <?php
                    endwhile;
                    ?>
                </div>
                <!--main__blog-home--->
                <div class="pagination">
                <?php

                the_posts_pagination([
                    'prev_text'    => __('<button class="btn__pagination" type="submit">
                <span class="left__arrow">
                    &#8592;</span>
                Back
            </button>'),
                    'next_text'    => __('    <button class="btn__pagination right__btn-pagination" type="submit">
                Forward
                <span class="right__arrow">
                    &#8594;
                </span>
            </button>'),
                ]);
            endif;
            wp_reset_postdata();
                ?>

                </div>

                <!-- <button class="btn__pagination" type="submit">
                <span class="left__arrow">
                    &#8592;</span>
                Back
            </button>
            <span class="number__pagination">
                <a href="#!">1</a>
            </span>
            <span class="number__pagination">
                <a href="#!">2</a>
            </span>
            <span class="number__pagination">
                <a href="#!">3</a>
            </span>
            <button class="btn__pagination right__btn-pagination" type="submit">
                Forward
                <span class="right__arrow">
                    &#8594;
                </span>
            </button> -->

        </div>
    </div>
</section>
<?php
get_footer();

?>