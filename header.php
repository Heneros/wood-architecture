<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php bloginfo('name'); is_home() ? bloginfo() : wp_title('||'); ?></title>
	<meta name="description" content="Site about wood architecture"> 
	<meta name="keywords" content="Wood, Design, Architecture">
	<meta name="author" content="Rustam">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
	<meta property="og:image" content="images/preview.jpg">
    <?php wp_head(); ?>
</head>  
<body <?php body_class(); ?> >
	<div class="loading">
		<div class="sub__loading"></div>
		<p>Loading...</p>
	</div>
	<div class="<?php if(is_page('homepage')){ echo "navbar"; }else{ echo "navbar__white"; } ?>">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-6">
					<div class="logo">
						<a href="<?php echo site_url('/') ?>" class="logo__link">
							<i></i>Wood <span>Architecture</span>
						</a>
					</div>
				</div>
				<div class="col-md-9 col-lg-6 col-6 menu-container">
				 <i class="menu-toggle"></i>
					<?php 
					wp_nav_menu([
						"theme_location"=> "menu-header",
						"menu_class" =>  "top-menu",
						'container_class' => '',
						'add_li_class' => 'top-menu__item',
						'link_class' => 'top-menu__link'
					]);
					?>
				</div>
				<div class="col-md-3 d-none d-lg-block nav-social-wrap">
				<?php if(have_rows('social_links_header',  'option')): ?>
					<div class="nav-social">
						<?php while(have_rows('social_links_header',  'option')): 
							the_row();
							$link__header = get_sub_field('link');
							$icon__header = get_sub_field('icon');
							?>
						<a href="<?= $link__header; ?>" class="nav-social__item" target="_blank">
							<img src="<?= esc_url($icon__header['url']); ?>" alt="<?= esc_attr($icon__header['alt']); ?>">
						</a>
					  <?php endwhile; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>