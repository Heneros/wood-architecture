<?php

/**
 * 
 * Template Name: Company
 * 
 */
get_header();
?>

<section class="company">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <aside class="tabs__items js-tabs">
                    <span class="title__tabs">
                        Information About Us
                    </span>
                    <ul>
                        <li><a data-tab-open="about__company" class="item__tab 
								about__company-tab
								js-tabs-head-item">
                                About Company
                            </a></li>
                        <li><a data-tab-open="advantages__block" class="item__tab 
							advantages__tab
							js-tabs-head-item ">
                                Advantages
                            </a></li>
                        <li>
                            <a data-tab-open="our__partners" class="item__tab js-tabs-head-item  ">
                                Our Partners
                            </a>
                        </li>
                        <li>
                            <a data-tab-open="contact__us" class="item__tab js-tabs-head-item active__show">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="col-md-9 js-tabs-body">
                <div data-tab="about__company" class="about__company
					 js-tabs-body-item  ">
                    <h1 class="main__title-company"><?= get_field('about_company_title'); ?></h1>
                    <?php
                    the_content()
                    ?>
                </div>
                <div data-tab="advantages__block" class="advantages__block  js-tabs-body-item ">
                    <h1 class="title__advantages">
                        <?= get_field('our_advantages_title') ?>
                    </h1>
                    <?php
                    if (have_rows('our_advantages')) :
                    ?>
                        <div class="advantage__items">
                            <?php
                            while (have_rows('our_advantages')) :
                                the_row();
                                $featured_img = get_sub_field('icon');
                            ?>
                                <div class="advantage__item">
                                    <div class="advantage__item-img">
                                        <img src="<?php echo esc_url($featured_img['url']); ?>" alt="<?php ?>">
                                    </div>
                                    <span class="advantage__item-title"><?= get_sub_field('title'); ?></span>
                                    <p>
                                        <?= get_sub_field('description'); ?>
                                    </p>
                                    <a href="<?= get_sub_field('link'); ?>" class="read__more">
                                        Read More
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div data-tab="our__partners" class="our__partners  js-tabs-body-item ">
                    <h1 class="main__title-partners">
                        <?= get_field('our_partners_title');  ?>
                    </h1>
                    <?php
                    if (have_rows('our_partners_items')) :
                    ?>
                        <div class="partners__items">
                            <?php
                            while (have_rows('our_partners_items')) :
                                the_row();
                                $logo = get_sub_field('image');
                            ?>
                                <div class="partner__item">
                                    <div class="logo__partner">
                                        <img src="<?= esc_url($logo['url']) ?>" alt="<?= esc_attr($logo['alt']) ?>">
                                    </div>
                                    <div class="text">
                                        <span class="title__partner"><?= get_sub_field('title'); ?></span>
                                        <p>
                                            <?= get_sub_field('descriprion'); ?>
                                        </p>
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
                <div data-tab="contact__us" class="contact__us js-tabs-body-item active__show">
                    <div class="text__contact-us">
                        <span class="main__title-contact">
                            Contact Us
                        </span>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque fuga exercitationem voluptate esse omnis tempora praesentium repellendus eaque nisi, cum facilis distinctio earum, sit molestiae consequuntur, aliquid vero tempore vitae sequi recusandae perspiciatis ipsam. Earum.</p>
                    </div>
                    <?php
                    echo do_shortcode('[contact-form-7 id="322" title="Contact Us" html_id="form" html_class="contact__us-block"]');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php

    $location = get_field('map_location');

    $src = esc_url(
        add_query_arg([
            'key' => '',
            'q' => $location['address']
        ], 'https://www.google.com/maps/embed/v1/place')
    );
    // echo $src;
    ?>



    <div class="feedback__bottom active__show">
        <div class="information__bottom">
            <span class="title__bottom">Our Contacts</span>
            <address>New York, NY Empire State Building</address>
            <a class="phone__num" href="tel:<?= get_field('phone_number') ?>"><?= get_field('phone_number') ?></a>
        </div>
        <div class="map__contact-us">
            <iframe width="600" height="450" frameborder="0" style="border:0" src="<?php echo $src; ?>" allowfullscreen>
            </iframe>
        </div>

    </div>
</section>

<?php

get_footer();

?>