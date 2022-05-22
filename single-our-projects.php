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
                    <div class="excerpt__project">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<?php

get_footer();

?>