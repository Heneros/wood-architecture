<!---Footer-->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="left__side-footer">
					<div class="about__us-footer">
						<div class="logo">
							<a href="<?= site_url('/'); ?>" class="logo__link">
								<i></i>Wood <span>Architecture</span>
							</a>
						</div>
						<div class="about__us-text">
							<span class="title__aboutUs-footer"><?= get_field('title_footer_about_us', 'option'); ?></span>
							<p>
								<?= get_field('description_footer_about_us', 'option'); ?>
							</p>
						</div>
					</div>
					<div class="menu__footer">
						<span class="title__aboutUs-footer">Menu</span>
						<?php
						echo wp_nav_menu([
							"theme_location" => "menu-header",
						])
						?>
					</div>
				</div>
			</div>
			<!--"col-md-6--->
			<div class="col-md-6">
				<div class="right__side-footer">
					<div class="services__footer">
						<span class="title__aboutUs-footer"> <a href="<?= site_url('/services'); ?>"> Services </a></span>
						<?php
						$query = new WP_Query([
							'post_type' => 'services',
							'posts_per_page' => 5
						]);
						if ($query->have_posts()) :
						?>
							<ul>
								<?php
								while ($query->have_posts()) :
									$query->the_post() ?>
									<li><a href="<?= get_permalink(); ?>"><?php echo the_title(); ?></a></li>
								<?php
								endwhile;
								?>
							</ul>
						<?php
						endif;
						?>
					</div>
					<div class="social__networks">
						<span class="title__aboutUs-footer"><?= get_field('title_footer_social_media', 'option');  ?></span>
						<p>
							<?= get_field('description_footer_social_media', 'option');  ?>
						</p>
						<?php if (have_rows('social_links_header',  'option')) : ?>
							<div class="nav__social-footer">
								<?php while (have_rows('social_links_header',  'option')) :
									the_row();
									$link__header = get_sub_field('link');
									$icon__header = get_sub_field('icon');
								?>
									<a href="<?= $link__header; ?>" class=" nav-social__item" target="_blank"><img src="<?= esc_url($icon__header['url']); ?>" alt="<?= esc_attr($icon__header['alt']); ?>"></a>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>


<!---Up-->
<a href=" #" id="up" class="up">
	<img src="<?php echo get_template_directory_uri(); ?>/images/up.png" alt="up">
</a>
<?php wp_footer(); ?>
</body>

</html>