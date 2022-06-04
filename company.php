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
                        Our Partners
                    </h1>
                    <div class="partners__items">
                        <div class="partner__item">
                            <div class="logo__partner">
                                <img src="images/our-partners/black-logo-1.png" alt="logo">
                            </div>
                            <div class="text">
                                <span class="title__partner">Milano Parquet S.R.L</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident libero nostrum illo fugiat id natus cupiditate amet beatae doloribus asperiores facilis, nobis ea, deleniti nesciunt reprehenderit laboriosam dolores earum! Soluta?</p>
                            </div>

                        </div>
                        <div class="partner__item">
                            <div class="logo__partner">
                                <img src="images/our-partners/black-logo-2.png" alt="logo">
                            </div>
                            <div class="text">
                                <span class="title__partner">Mazzucato Legnami</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum cupiditate maxime tenetur veniam? Neque consequatur excepturi nesciunt rerum laudantium natus aut! Totam ex earum quibusdam maiores dicta, ipsam exercitationem aut sequi inventore est et iusto similique quia aliquam, sed sapiente deleniti eveniet voluptate hic eum aspernatur ducimus fuga fugit. Ipsa voluptas assumenda sed itaque totam ipsam saepe velit obcaecati soluta porro, autem fugiat quas corrupti.</p>
                            </div>

                        </div>
                        <div class="partner__item">
                            <div class="logo__partner">
                                <img src="images/our-partners/black-logo-3.png" alt="logo">
                            </div>
                            <div class="text">
                                <span class="title__partner">Andrea Fanfani</span>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero placeat pariatur incidunt aliquid facere impedit dolore voluptatem, qui dolores aspernatur laboriosam illum sunt quo quod est nesciunt hic sint doloribus asperiores harum! Quia, ullam dolorum consequatur quis exercitationem fugit id obcaecati laudantium provident voluptatum nihil eveniet placeat incidunt, officia, repudiandae hic molestias magni illo neque earum rerum fuga. Dignissimos quidem quas maiores ut expedita quam alias nisi, quaerat quis tempora, amet corrupti laboriosam repellat. Officia?</p>
                            </div>

                        </div>
                        <div class="partner__item">
                            <div class="logo__partner">
                                <img src="images/our-partners/black-logo-4.png" alt="logo">
                            </div>
                            <div class="text">
                                <span class="title__partner">Angelo Cappellini</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae reiciendis, beatae illo incidunt, praesentium blanditiis tenetur cumque ex quae tempora optio, provident laboriosam sapiente. Error incidunt voluptates dolorum, magnam nam aut ea qui, minus eaque ex enim eveniet accusamus sed cumque reprehenderit quod vitae sapiente.</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div data-tab="contact__us" class="contact__us js-tabs-body-item active__show">
                    <div class="text__contact-us">
                        <span class="main__title-contact">
                            Contact Us
                        </span>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque fuga exercitationem voluptate esse omnis tempora praesentium repellendus eaque nisi, cum facilis distinctio earum, sit molestiae consequuntur, aliquid vero tempore vitae sequi recusandae perspiciatis ipsam. Earum.</p>
                    </div>
                    <form id="form" class="contact__us-block " action="">
                        <input type="text" name="name" placeholder="Name..." id="">
                        <input type="tel" name="phone" placeholder="Phone..." id="">
                        <textarea name="commentary" placeholder="Your Message" id="" cols="15" rows="8"></textarea>
                        <button class="btn__contact-us" type="submit">Send Message</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="feedback__bottom active__show">
        <div class="information__bottom">
            <span class="title__bottom">Our Contacts</span>
            <address>New York, NY Empire State Building</address>
            <a class="phone__num" href="tel:75554449055">7(555)-444-90-55</a>
        </div>
        <div class="map__contact-us">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d35199.669464484534!2d-74.02971788264841!3d40.747293792863296!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2z0K3QvNC_0LDQudGALdGB0YLQtdC50YIt0LHQuNC70LTQuNC90LM!5e0!3m2!1sru!2sua!4v1650914237998!5m2!1sru!2sua" width="930" height="524" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>
</section>

<?php

get_footer();

?>