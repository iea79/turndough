<div class="welcome-slider">
	<div class="welcome-slider__bg"> <?php echo wp_get_attachment_image(SCF::get('first__bg'), 'full') ?></div>
	<div class="welcome-slider__arrow welcome-slider__arrow--prev swiper-button-prev"><img src="<?php echo get_template_directory_uri() . '/img/arrow-slider.svg' ?>" alt=""></div>
	<div class="welcome-slider__arrow welcome-slider__arrow--next swiper-button-next"><img src="<?php echo get_template_directory_uri() . '/img/arrow-slider.svg' ?>" alt=""></div>
	<div class="welcome-slider__slider">
		<div id="sliderWelcolme">
			<div class="swiper-wrapper">
				<?php
				$first_slider = SCF::get('first_slider');

				foreach ($first_slider as $item) {
				?>
					<div class="swiper-slide">
						<div class="wrapper">
							<div class="welcome-slider__content">
								<div class="title"><?php echo $item['first__title'] ?></span></div>
								<div class="welcome-slider__text"><?php echo $item['first__text'] ?></div>
							</div>
							<div class="welcome-slider__img"> <?php echo wp_get_attachment_image($item['first__img'], 'full', null, array('class' => "js-parallaxMouse")) ?></div>
						</div>
					</div>
				<?php
				};
				?>
			</div>
		</div>
	</div>
</div>
<!-- /welcome-slider-->
<!-- benefit-->
<div class="benefit">
	<div class="wrapper">
		<div class="benefit__content">
			<div class="subtitle subtitle--blue"><?php echo SCF::get('benefit__title'); ?></div>
			<div class="benefit__text">
				<p><?php echo SCF::get('benefit__text'); ?></p>
				<ul>
					<?php
					$benefit_list = SCF::get('benefit_list');

					foreach ($benefit_list as $item) {
					?>
						<li> <?php echo wp_get_attachment_image($item['benefit__list_img'], 'full') ?><span><?php echo $item['benefit__list_text'] ?></span></li>
					<?php
					};
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="benefit__img"> <?php echo wp_get_attachment_image(SCF::get('benefit__bg'), 'full') ?></div>
	<div class="benefit__arrow js-scroll-to"><a href="#instagram"> <img src="<?php echo get_template_directory_uri() . '/img/arrow.svg' ?>" alt=""></a></div>
	<div class="benefit__fly"> <img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-1.png' ?>" alt="" data-revers="true"></div>
</div>
<!-- /benefit-->
<!-- products-slider-->
<?php
$product_term = get_term(SCF::get('product__cat')[0]);
$product_meta = get_term_meta(SCF::get('product__cat')[0]);
$product_tax = get_taxonomy(SCF::get('product__cat')[0]);
$product_color = $product_meta['cat_color'][0];
// var_dump($product_meta);
// var_dump($product_term->name);
// var_dump($product_tax);
// global $post;
$products = new WP_Query([
	'post_type' => 'products',
	// 'meta_value' => $product_color,
	'product-category' => $product_term->name,
]);

// var_dump($products);
?>
<div class="products-slider">
	<div class="products-slider__fly-1"><img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-2.png' ?>" alt="" data-revers="true"></div>
	<div class="products-slider__fly-2"><img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-3.png' ?>" alt=""></div>
	<div class="products-slider__block">
		<div class="wrapper">
			<div class="title" style="color: <?php echo $product_color; ?>"><?php echo SCF::get('product__title'); ?></div>
			<div class="products-slider__sub" style="color: <?php echo $product_color; ?>"><?php echo SCF::get('product__text'); ?></div>
			<div class="products-slider__slider">
				<div id="sliderProduct">
					<div class="swiper-wrapper">
						<?php
						if ($products->have_posts()) {
							while ($products->have_posts()) {
								$products->the_post();
								$pMeta = get_post_meta(get_the_ID());
						?>
								<div class="swiper-slide">
									<div class="products-slider__card">
										<div class="products-slider__img" style="background-color: <?php echo $product_color; ?>">
											<?php echo wp_get_attachment_image($pMeta['product__photo'][0], 'full') ?>
										</div>
										<div class="products-slider__title" style="color: <?php echo $product_color; ?>"><?php the_title() ?></div>
										<div class="products-slider__text"><?php echo $pMeta['product__text'][0] ?></div>
										<div class="products-slider__btn"> <a href="/menu/">more</a></div>
									</div>
								</div>
						<?php
							}
						}
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /products-slider-->
<!-- besides-->
<div class="besides">
	<div class="besides__fly-1"><img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-4.png' ?>" alt="" data-revers="true"></div>
	<div class="besides__fly-2"><img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-5.png' ?>" alt=""></div>
	<div class="besides__fly-3"><img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-3.png' ?>" alt="" data-revers="true"></div>
	<div class="wrapper">
		<div class="subtitle subtitle--pink"><?php echo SCF::get('besides__title'); ?></div>
		<div class="besides__text"><?php echo SCF::get('besides__text'); ?></div>
		<?php
		$besides_list = SCF::get('besides_list');

		foreach ($besides_list as $key => $item) {
		?>
			<div class="besides__item besides__item--<?php echo $key ?>">
				<?php echo wp_get_attachment_image($item['besides__list_img'], 'full') ?>
				<span><?php echo $item['besides__list_title'] ?></span>
			</div>
		<?php
		};
		?>
	</div>
</div>
<!-- /besides-->
<!-- more-offer-->
<div class="more-offer">
	<div class="more-offer__fly-1"><img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-6.png' ?>" alt="" data-revers="true"></div>
	<div class="more-offer__fly-2"><img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-7.png' ?>" alt="" data-revers="true"></div>
	<div class="wrapper">
		<div class="more-offer__content">
			<div class="subtitle subtitle--blue"><?php echo SCF::get('offer__title'); ?></div>
			<div class="more-offer__text"><?php echo SCF::get('offer__title'); ?></div>
		</div>
		<div class="more-offer__img"><?php echo wp_get_attachment_image(SCF::get('offer__img'), 'full') ?></div>
	</div>
</div>
<!-- /more-offer-->
<!-- instagram-->
<div class="instagram" id="instagram">
	<div class="instagram__fly"> <img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-8.png' ?>" alt=""></div>
	<div class="instagram__container">
		<div class="wrapper">
			<div class="subtitle subtitle--pink"><?php echo SCF::get('instagram__title'); ?></div>
			<div class="instagram__slider">
				<div id="sliderInstagram">
					<div class="swiper-wrapper">
						<?php
						$instagram_list = SCF::get('instagram_list');

						foreach ($instagram_list as $item) {
						?>
							<div class="swiper-slide">
								<a class="instagram__img" href="<?php echo $item['instagram__link'] ?>">
									<?php echo wp_get_attachment_image($item['instagram__img'], 'full') ?>
								</a>
							</div>
						<?php
						};
						?>
					</div>
				</div>
			</div>
			<div class="instagram__link"> <a href="<?php echo SCF::get_option_meta('our-contacts', 'contacts__instagram'); ?>" aria-label="Instagram link"><?php echo SCF::get('instagram__link_text'); ?></a></div>
		</div>
	</div>
</div>
<!-- /instagram-->
<!-- contact-->
<div class="contact">
	<div class="contact__fly"> <img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-9.png' ?>" alt="" data-revers="true"></div>
	<div class="wrapper">
		<div class="contact__content">
			<div class="subtitle subtitle--white">Where Iconic Locations Meet Delicious Delights</div>
			<div class="contact__sub">Our stores are perfectly situated in two iconic and vibrant locations: the sun-kissed Venice Boardwalk and the world-famous Hollywood Walk of Fame.</div>
			<div class="contact__buttons"> <a class="contact__btn active" href="#">
					<div class="contact__btn-icon">
						<svg class="icon-point">
							<use xlink:href="<?php echo get_template_directory_uri() . '/img/sprite.svg#point' ?>"></use>
						</svg>
					</div><span>Hollywood</span>
				</a><a class="contact__btn" href="#">
					<div class="contact__btn-icon">
						<svg class="icon-point">
							<use xlink:href="<?php echo get_template_directory_uri() . '/img/sprite.svg#point' ?>"></use>
						</svg>
					</div><span>Venice</span>
				</a></div>
			<div class="contact__text">
				<h3>Turn Dough</h3>
				<p><?php echo SCF::get_option_meta('our-contacts', 'contacts__addres'); ?></p>
			</div>
			<div class="contact__text">
				<h3>Contact information</h3>
				<p>Promotional: <?php echo SCF::get_option_meta('our-contacts', 'contacts__email'); ?> General: <?php echo SCF::get_option_meta('our-contacts', 'contacts__email_general'); ?> Phone Number: <?php echo SCF::get_option_meta('our-contacts', 'contacts__tel'); ?></p>
			</div>
			<div class="contact__text">
				<h3>Hours</h3>
				<p>Open 7 Days a Week from noon until sellout</p>
			</div>
		</div>
	</div>
	<div class="contact__map">
		<div id="map"> </div>
	</div>
</div>