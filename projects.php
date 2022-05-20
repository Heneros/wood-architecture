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
</div>
<?php
get_footer();

?>