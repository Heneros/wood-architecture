<div 
id="post-<?php the_ID(); ?>" 
class="col-md-4 best-works__item-wrapper" <?php post_class(); ?> >
					<a href="#!" class="best-item">
						<div class="best-item__img-wrapper">
							<?= the_post_thumbnail('homepage-thumb') ?>
						</div>
						<div class="best-item__content">
							<div class="address-line" title="<?= the_title(); ?>"><?= the_title(); ?></div>
							<div class="best-item__desc"><?= the_excerpt(); ?></div>
						</div>
			</a>
</div>
