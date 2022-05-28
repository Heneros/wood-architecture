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
        <div class="field__search">
            <!-- <input type="text" autocomplete="of" name="search" placeholder="Search" id="search"> -->
            <input type="search" name="search" id="search" placeholder="search">
        </div>
        <div class="results-search" id="results-search"></div>
        <div id="items__service" class="row">
            <div class="item__service ">
                <div class="item__text">
                    <span class="title">Lorem ipsum, dolor</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, at adipisci fuga quam quasi eaque consequatur perspiciatis. Officiis odit facilis nesciunt quae alias quaerat expedita!</p>
                </div>
                <div class="item__img">
                    <img src="images/services/service-1.png" alt="image">
                </div>
            </div>
            <div class="item__service ">
                <div class="item__text">
                    <span data-id="" class="title">Lorem ipsum, dolor</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, at adipisci fuga quam quasi eaque consequatur perspiciatis. Officiis odit facilis nesciunt quae alias quaerat expedita!</p>
                </div>
                <div class="item__img">
                    <img src="images/services/service-2.png" alt="image">
                </div>
            </div>
            <div class="item__service ">
                <div class="item__text">
                    <span class="title">Lorem ipsum, dolor</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, at adipisci fuga quam quasi eaque consequatur perspiciatis. Officiis odit facilis nesciunt quae alias quaerat expedita!</p>
                </div>
                <div class="item__img">
                    <img src="images/services/service-3.png" alt="image">
                </div>
            </div>


            <div class="item__service ">
                <div class="item__text">
                    <span class="title">Lorem ipsum, dolor</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, at adipisci fuga quam quasi eaque consequatur perspiciatis. Officiis odit facilis nesciunt quae alias quaerat expedita!</p>
                </div>
                <div class="item__img">
                    <img src="images/services/service-4.png" alt="image">
                </div>
            </div>
            <div class="item__service ">
                <div class="item__text">
                    <span class="title">Lorem ipsum, dolor</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, at adipisci fuga quam quasi eaque consequatur perspiciatis. Officiis odit facilis nesciunt quae alias quaerat expedita!</p>
                </div>
                <div class="item__img">
                    <img src="images/services/service-5.png" alt="image">
                </div>
            </div>
            <div class="item__service ">
                <div class="item__text">
                    <span class="title">Lorem ipsum, dolor</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, at adipisci fuga quam quasi eaque consequatur perspiciatis. Officiis odit facilis nesciunt quae alias quaerat expedita!</p>
                </div>
                <div class="item__img">
                    <img src="images/services/service-6.png" alt="image">
                </div>
            </div>

        </div>
    </div>
    <a class="load__more">
        Load More
    </a>
    </div>
</section>
<?php

get_footer();

?>