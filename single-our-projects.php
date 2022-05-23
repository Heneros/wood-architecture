<?php

get_header();

$gallery_images = get_field('gallery_images');
$size = 'full';

?>
<section class="project">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="gallery">
                    <div class="swiper mySwiperGallery2">
                        <div class="swiper-wrapper">
                            <?php
                            if ($gallery_images) :
                                foreach ($gallery_images as $gallery_image) : ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($gallery_image['url']) ?>" alt="<?php echo esc_attr($gallery_image['alt']) ?>">
                                    </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="swiper mySwiperGallery1">
                        <div class="swiper-wrapper">
                            <?php
                            if ($gallery_images) :
                                foreach ($gallery_images as $gallery_image) : ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($gallery_image['url']) ?>" alt="<?php echo esc_attr($gallery_image['alt']) ?>">
                                    </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <!--Gallery ends-->
            </div>
        </div>
    </div>
</section>
<section class="description__project">
    <div class="container">
        <div class="row">
            <h1 class="main_title__description-project">
                <?php the_title(); ?>
            </h1>
            <div class="container__description">
                <div class="col-md-8">
                    <div class="project__content">
                        <?php the_content(); ?>
                    </div>

                </div>
                <div class="col-md-4">
                    <?php
                    wp_reset_postdata();
                    $select_professionals = get_field('select_professional');
                    foreach ($select_professionals as $select_professional) :
                        $title_prof = $select_professional->post_title;
                        $post_id =  $select_professional->ID;
                        $featured_img = wp_get_attachment_url(get_post_thumbnail_id($post_id));
                        $field = get_field_object('select_position');
                    
                        var_dump($select_professionals);
                    ?>
                        <div class="excerpt__project">
                            <div class="title__excerpt-project"><?=  $value; ?> Architect </div>
                            <div class="image__author">
                                <img src="<?php echo $featured_img; ?>" alt="">
                            </div>
                            <div class="about__architect">
                                <span class="title__name-project">
                                    <?php echo $title_prof; ?>
                                </span>
                                <p>
                                    <?php
                                    the_excerpt();
                                    ?>
                                </p>
                            </div>


                        </div>
                    <?php endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>

</section>


<?php

get_footer();

?>