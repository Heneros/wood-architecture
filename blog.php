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

            $query = new WP_Query([
                'post_type' => "post",
                'posts_per_page' => 6
            ]);
            if ($query->have_posts()) :
            ?>
                <div class="main__blog">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                    ?>
                        <div class="item__blog">
                            <div class="image__blog">
                                <img src="images/our-blog/first-item.png" alt="">
                                <div class="date__item-blog">5 January</div>
                            </div>
                            <h2 class="title__blog-item"><?= the_title(); ?></h2>
                            <div class="description__blog">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, assumenda eum iure nulla alias voluptatum?
                            </div>
                            <a href="blog-post.html" class="full__story">
                                Full Story
                            </a>
                        </div>
                    <?php
                    endwhile;
                    ?>
                </div>
            <?php
            endif;
            ?>
            <!--main__blog-home--->
        </div>
        <div class="pagination">
            <button class="btn__pagination" type="submit">
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

            </button>
        </div>
    </div>
</section>
<?php
get_footer();

?>