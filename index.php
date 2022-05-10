
<?php 

get_header(); 

/**
 * 
 * Template Name: Homepage
 * 
*/
  ?>

<div class="home-slider">
	<div class="swiper-wrapper">
       <?php
	    if(have_rows('slider_homepage')):  
			while(have_rows('slider_homepage')):
				the_row();
				$bg_image = get_sub_field('image_item_slider');
				$title_item_slider = get_sub_field('title_item_slider');
				$description_item_slider = get_sub_field('description_item_slider');

	   ?>
		<div class="swiper-slide home-slider__slide" style="background-image: url(<?php echo esc_url($bg_image['url']); ?>);">
            <div class="container">
				<h2 data-animate="bottom" class="home-slider__heading">
				<?php echo $title_item_slider; ?>
				</h2>
				<p data-animate="bottom" class="home-slider__text">
				<?php echo $description_item_slider; ?>
				</p>
			</div>
		</div>
		<?php
		endwhile;
		endif;
		?>
	</div>
	<div class="row home-slider__bottom">
		<div class="col-3 home-slider__pagination-wrapper">
			<div class="home-slider__pagination swiper-pagination"></div>
		</div>
		<div class="col-6">
			<div class="home-slider__scrollbar swiper-scrollbar"></div>
		</div>
		<div class="col-3 home-slider__nav">
			<div class="home-slider__prev swiper-button-prev"></div>
			<div class="home-slider__next swiper-button-next"></div>
		</div>
	</div>
</div>
<section class="home-callback">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-6">
				<h3 class="home-callback__header"><?= get_field('title_our_trust'); ?></h3>
				<?php
				if(have_rows('items_list_trust')):
				?>
				<ul class="home-callback__list">
				<?php
					while(have_rows('items_list_trust')):
						the_row();
					$titleItem = get_sub_field('title');
				?>
					<li><?php echo $titleItem; ?></li>
					<?php endwhile?>
				</ul>
				<?php
				endif;
				?>
			</div>
			<div class="col-xl-4 col-lg-6 home-callback__text-right">
				<p>
					<?= get_field('description_callback');  ?>
				</p>
					<a href="tel:<?= get_field('phone_number'); ?>" class="phone-big home-callback__phone" title="Call">
					<?= get_field('phone_number'); ?>
					</a>
			          <button class="button home-callback__button" data-custom-open="modal" data-form="Form section" >
					  <?= get_field('button_text_trust'); ?>
						</button>
				</div>
		</div>
	</div>
</section>

<section class="best-works">
	<div class="best-works__top">
		<div class="container">
			<div class="row">
				<div class="col-xl-10 offset-xl-1 col-lg-12 best-works__top-wrapper">
					<div class="best-works__left">
					<?= get_field('description_best_works'); ?>

					</div>
					<div class="best-works__right">
						<div class="section-title">
							<div class="section-title__name"><?= get_field('title__best_works'); ?></div>
							<h2 class="section-title__desc"><?= get_field('subtitle_best_works'); ?></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="best-works__bottom">
		<div class="container">
			<div class="row">
				<?php
		             $query = new WP_Query([
                         'post_type' => 'post'
                     ]);
				if($query->have_posts()):
					while ($query->have_posts()):
						$query->the_post();
				get_template_part('theme-parts/content-article'); 
				endwhile;
				endif;
				?>
			</div>
		</div>
         <?php  
         get_template_part('loadmore');
         ?>
	</div>
</section>

<section class="advantages">
	<div class="container">
		<div class="row">
			<div class="col-md-6 advantages-slider-wrapper">
				<div class="advantages-slider">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="images/portfolio/interior-6_adv.jpg" alt="">
						</div>
						<div class="swiper-slide">
							<img src="images/portfolio/interior-8_adv.jpg" alt="">
						</div>
					</div>
					<div class="advantages-slider__caption">32 <span>years on market</span></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="section-title section-title--dotted">
					<div class="section-title__name">About us</div>
					<div class="section-title__desc">We creating best and comfortable design for you</div>
					<div class="section-title__paragraph">
						Lorem ipsum, dolor sit amet consectetur adipisicing elit. In nisi quod est illum neque hic facere adipisci minus architecto, modi, labore at nam distinctio amet.
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 advantages__item-wrapper">
						<div class="item-advantages">
							<a href="#!" class="item-advantages__heading">
								<div class="item-advantages__icon-wrapper">
									<img src="images/advantages/eco.svg" alt="alt">	</div>
									<div class="item-advantages__heading-text">Safe Materials</div>
								</a>
								<p class="item-advantages__desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum corrupti enim, unde ipsum magni beatae accusamus aspernatur itaque id rem eaque? Rem expedita quaerat ipsa?</p>
								<a href="#!" class="read-more item-advantages__more">Read More</a>
						</div>
					</div>
					<div class="col-md-6 advantages__item-wrapper">
						<div class="item-advantages">
							<a href="#!" class="item-advantages__heading">
								<div class="item-advantages__icon-wrapper">
									<img src="images/advantages/wood.svg" alt="alt">	</div>
									<div class="item-advantages__heading-text">Safe Materials</div>
								</a>
								<p class="item-advantages__desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum corrupti enim, unde ipsum magni beatae accusamus aspernatur itaque id rem eaque? Rem expedita quaerat ipsa?</p>
								<a href="#!" class="read-more item-advantages__more">Read More</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>   
<!---Our Partners-->      
<section class="our__partners" style="background-image: url('images/our-partners/bg-our-partners.png');     background-size: cover;">
	<div class="container">
	<div class="row">
		<h1 class="our__partners-title">Our Partners</h1>
		<div class="our__partners-items">
		<div class="col-md-3 col-12">
			<div class="item__our-partner">
				<div class="image__block">
					<img src="images/our-partners/logo-first.png" alt="our-partner">
				</div>
				<div class="description__item-partner">
					<span class="company__name-partner">
						Milano Parquet S.R.L.
					</span>
								We take care of the wood and carefully monitor the entire production process.
				</div>
			</div>
		</div>
		<div class="col-md-3 col-12">
			<div class="item__our-partner">
				<div class="image__block">
					<img src="images/our-partners/logo-second.png" alt="our-partner">
				</div>
				<div class="description__item-partner">
					<span class="company__name-partner">
						Milano Parquet S.R.L.
					</span>
								We take care of the wood and carefully monitor the entire production process.
				</div>
			</div>
		</div>
		<div class="col-md-3 col-12">
			<div class="item__our-partner">
				<div class="image__block">
					<img src="images/our-partners/logo-third.png" alt="our-partner">
				</div>
				<div class="description__item-partner">
					<span class="company__name-partner">
						Milano Parquet S.R.L.
					</span>
								We take care of the wood and carefully monitor the entire production process.
				</div>
			</div>
		</div>
		<div class="col-md-3 col-12">
			<div class="item__our-partner">
				<div class="image__block">
					<img src="images/our-partners/logo-fourth.png" alt="our-partner">
				</div>
				<div class="description__item-partner">
					<span class="company__name-partner">
						Milano Parquet S.R.L.
					</span>
								We take care of the wood and carefully monitor the entire production process.
				</div>
			</div>
		</div>
	</div>  
	</div>
</div>
</section>
<!---Our Blog-->
<section class="our__blog">
	<div class="container">
        <div class="row">
			<h1 class="main__title-blog">Our Blog</h1>
	
			<div class="col-md-8  slider__blog-home ">
			<div class="slider__blog">
	          <div class="swiper-wrapper"> 
				<div class="swiper-slide item__slider-blog">
				   <div class="image__blog">
						<img src="images/our-blog/first-item.png" alt="item slider">
						<div class="date__item-blog">2 January</div>
					</div>
					<h2 class="title__blog-item">Lorem ipsum dolor sit.</h2>
					<div class="description__blog">
						Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, assumenda eum iure nulla alias voluptatum?
					</div>
					<a href="#!" class="full__story">
						Full Story 
					</a>
				</div> 
				<div class="swiper-slide item__slider-blog">
					<div class="image__blog">
						<img src="images/our-blog/second-item.png" alt="item slider">
						<div class="date__item-blog">7 January</div>
					</div>
			
					<h2 class="title__blog-item">Lorem ipsum dolor sit.</h2>
					<div class="description__blog">
						Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, assumenda eum iure nulla alias voluptatum?
					</div>
					<a href="#!" class="full__story">
						Full Story 
					</a>
				</div>
				<div class="swiper-slide item__slider-blog">
					<div class="image__blog">
						<img src="images/our-blog/first-item.png" alt="item slider">
						<div class="date__item-blog">8 January</div>
					</div>
			
					<h2 class="title__blog-item">Lorem ipsum dolor sit.</h2>
					<div class="description__blog">
						Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, assumenda eum iure nulla alias voluptatum?
					</div>
					<a href="#!" class="full__story">
						Full Story 
					</a>
				</div>
				<div class="swiper-slide item__slider-blog">
					<div class="image__blog">
						<img src="images/our-blog/first-item.png" alt="item slider">
						<div class="date__item-blog">8 January</div>
					</div>
					<h2 class="title__blog-item">Lorem ipsum dolor sit</h2>
					<div class="description__blog">
						Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus, assumenda eum iure nulla alias voluptatum?
					</div>
					<a href="#!" class="full__story">
						Full Story 
					</a>
				</div>
			</div> <!--swiper-wrapper--->
            <div class="row slider__bottom-pagination">
				<div class="blog-slider__pagination swiper-pagination"></div>
			</div>
	    </div><!--slider__blog-home--->
	</div><!---col-md-8-->   
			<div class="col-md-4 ">
				<div style="background-image: url('images/our-blog/all-posts.png');" class="all__posts">
					<a href="blog.html">
					<div class="block__image-adaptive">
						<img src="images/our-blog/all-posts.png" alt="all posts">
						<span class="see__all-posts--adaptive" >
							See All Posts
						</span>   
					</div>
					<span class="see__all-posts" >
						See All Posts
					</span>   
				</a>
				</div>
			</div>

		</div>
	</div>
</section>
<!---Our Blog End-->




<?php 
get_template_part('theme-parts/modal');

get_footer();

?>