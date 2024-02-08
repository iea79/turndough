<!-- products-slider-->
<?php
$product_ids = SCF::get('product__cat');
$products = new WP_Query([
	'posts_per_page' => -1,
	'post_type' => 'products',
	'post__in'  => $product_ids,
	'orderby'   => 'post__in',
]);

?>
<div class="products-slider">
	<div class="products-slider__fly-1"><img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-2.png' ?>" alt="" data-revers="true"></div>
	<div class="products-slider__fly-2"><img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-3.png' ?>" alt=""></div>
	<div class="products-slider__block">
		<div class="wrapper">
			<div class="title"><?php echo SCF::get('product__title'); ?></div>
			<div class="products-slider__sub"><?php echo SCF::get('product__text'); ?></div>
			<div class="products-slider__slider">
				<div id="sliderProduct">
					<div class="swiper-wrapper">
						<?php
						if ($products->have_posts()) {
							while ($products->have_posts()) {
								$products->the_post();
								$pMeta = get_post_meta(get_the_ID());
								$pTax = get_the_terms(get_the_ID(), 'product-category')[0];
								// var_dump($pTax);
						?>
								<div class="swiper-slide">
									<div class="products-slider__card">
										<a href="<?php echo get_the_permalink() ?>" class="products-slider__img">
											<?php echo wp_get_attachment_image($pMeta['product__photo'][0], 'full') ?>
										</a>
										<a href="<?php echo get_the_permalink() ?>" class="products-slider__title"><?php the_title() ?></a>
										<div class="products-slider__text"><?php echo $pMeta['product__text'][0] ?></div>
										<div class="products-slider__btn">
											<a title="More link" href="<?php echo get_the_permalink() ?>">more</a>
										</div>
									</div>
								</div>
						<?php
							}
						}
						wp_reset_postdata();
						?>
					</div>
				</div>
				<div class="products-slider__arrows">
					<div class="swiper-button-prev products-slider__button--prev">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37 31" fill="none">
							<path d="M36.5508 14.6579L1.99988 14.6578M1.99988 14.6578C6.27712 14.6578 14.8316 17.7727 14.8316 30.2319M1.99988 14.6578C6.27712 14.3525 14.8316 10.9934 14.8316 -0.00010806" stroke="#91D7E1" stroke-width="2.66753" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="swiper-button-next products-slider__button--next">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 31" fill="none">
							<path d="M-1.36153e-06 14.6579L34.5509 14.6578M34.5509 14.6578C30.2737 14.6578 21.7192 17.7727 21.7192 30.2319M34.5509 14.6578C30.2737 14.3525 21.7192 10.9934 21.7192 -0.00010806" stroke="#91D7E1" stroke-width="2.66753" stroke-linejoin="round" />
						</svg>
					</div>
				</div>
			</div>
		</div>
		<div class="products-slider__action">
			<a href="<?php echo SCF::get('product__btn_link') ?>" class="btn"><?php echo SCF::get('product__btn'); ?></a>
		</div>
	</div>
</div>
<!-- /products-slider-->