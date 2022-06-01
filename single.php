<?php

get_header();

?>

<section class="blog__post">
    <div class="container">
        <div class="col-md-12">
            <div class="information__block">
                <h1 class="title">
                    <?php the_title(); ?>
                </h1>
                <p class="our__blog-desc">
                    <?= get_field('short_description'); ?>
                </p>
                <div class="content__blog-post">
                    <?php
                     the_content();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

get_footer();

?>