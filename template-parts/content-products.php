<!-- begin productHome -->
<section id="productHome" class="productHome section dark">
	<div class="productHome__bg"><?php echo wp_get_attachment_image(SCF::get('first_bg'), 'full') ?></div>
	<div class="container_center">
		<div class="productHome__content">
			<div class="productHome__left">
				<h1 class="section__title"><?php the_title() ?></h1>
				<div class="section__sub"><?php echo SCF::get('product__text'); ?></div>
				<div class="productHome__actions">
					<a href="<?php echo SCF::get('first_btn_link') ?>" class="btn btn_icon">
						<i>
							<?php echo wp_get_attachment_image(SCF::get('first_btn_icon'), 'full') ?>
						</i>
						<?php echo SCF::get('first_btn'); ?>
					</a>
					<a href="<?php echo SCF::get('second_btn_link') ?>" class="btn btn_icon">
						<i>
							<?php echo wp_get_attachment_image(SCF::get('second_btn_icon'), 'full') ?>
						</i>
						<?php echo SCF::get('second_btn'); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end productHome -->

<!-- begin productIngredients -->
<?php
$products_ingr_list = SCF::get('products_ingr_list');
if ($products_ingr_list) {
?>
	<section id="productIngredients" class="productIngredients section">
		<div class="productIngredients__bg">
			<?php echo wp_get_attachment_image(SCF::get('ingr_bg'), 'full') ?>
		</div>
		<div class="container_center">
			<div class="productIngredients__content">
				<div class="productIngredients__left">
					<?php
					foreach ($products_ingr_list as $key => $item) {
					?>
						<div class="productIngredients__tab<?php echo $key === 0 ? " active" : "" ?>" data-tab="ingr-<?php echo $key ?>">
							<?php echo wp_get_attachment_image($item['ingr_img'], 'full') ?>
						</div>
					<?php
					};
					?>
				</div>
				<div class="productIngredients__right">
					<h2 class="section__title">Ingredients</h2>
					<?php
					foreach ($products_ingr_list as $key => $item) {
					?>
						<div class="productIngredients__plate<?php echo $key === 0 ? " active" : "" ?>" data-plate="ingr-<?php echo $key ?>">
							<div class="productIngredients__name">
								<?php echo $item['ingr_title'] ?>:
								<?php echo $item['ingr_name'] ?>
							</div>
							<div class="section__sub"><?php echo $item['ingr_description'] ?></div>
						</div>
					<?php
					};
					?>
				</div>
			</div>
		</div>
		<div>
			<img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/f1.png' ?>" alt="" data-revers="true">
			<img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/f2.png' ?>" alt="" data-revers="true">
			<img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/f3.png' ?>" alt="" data-revers="true">
			<img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/f4.png' ?>" alt="" data-revers="true">
			<img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/f5.png' ?>" alt="" data-revers="true">
		</div>
	</section>
	<!-- end productIngredients -->
<?php } ?>

<?php
if (SCF::get('approach_title')) {
?>
	<!-- begin productApproach -->
	<section id="productApproach" class="productApproach section dark">
		<div class="productApproach__bg">
			<?php echo wp_get_attachment_image(SCF::get('approach_bg'), 'full') ?>
		</div>
		<div class="container_center">
			<div class="productApproach__content">
				<h2 class="section__title"><?php echo SCF::get('approach_title'); ?></h2>
				<div class="productApproach__list">
					<?php
					$approach_list = SCF::get('products_approach_list');

					foreach ($approach_list as $item) {
					?>
						<div class="productApproach__item">
							<div class="productApproach__marker"></div>
							<div class="productApproach__name"><?php echo $item['approach_name'] ?></div>
						</div>
					<?php
					};
					?>
				</div>
			</div>
		</div>
		<div>
			<img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/f6.png' ?>" alt="" data-revers="true">
			<img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/f7.png' ?>" alt="" data-revers="true">
		</div>
	</section>
	<!-- end productApproach -->
<?php } ?>

<?php
if (SCF::get('build_title')) {
?>
	<!-- begin productBuild -->
	<section id="productBuild" class="productBuild section">
		<div class="container_center">
			<h2 class="section__title"><?php echo SCF::get('build_title'); ?></h2>
			<div class="productBuild__content">
				<?php
				$build_step1 = SCF::get('build_step1');
				$build_step2 = SCF::get('build_step2');
				$build_step3 = SCF::get('build_step3');
				$build_step4 = SCF::get('build_step4');
				?>
				<div class="productBuild__steps">
					<?php
					if ($build_step1) {
					?>
						<div class="productBuild__step" data-tab="build-1">
							<span><?php echo SCF::get('build_step_name1'); ?></span>
						</div>
					<?php
					}
					if ($build_step2) {
					?>
						<div class="productBuild__step" data-tab="build-2">
							<span><?php echo SCF::get('build_step_name2'); ?></span>
						</div>
					<?php
					}
					if ($build_step3) {
					?>
						<div class="productBuild__step" data-tab="build-3">
							<span><?php echo SCF::get('build_step_name3'); ?></span>
						</div>
					<?php
					}
					if ($build_step4) {
					?>
						<div class="productBuild__step" data-tab="build-4">
							<span><?php echo SCF::get('build_step_name4'); ?></span>
						</div>
					<?php
					}
					?>
				</div>
				<div class="productBuild__plates">
					<?php
					if ($build_step1) {
					?>
						<div class="productBuild__plate" data-plate="build-1">
							<?php
							foreach ($build_step1 as $item) {
							?>
								<div class="productBuild__item">
									<div class="productBuild__img"><?php echo wp_get_attachment_image($item['build_img1'], 'full') ?></div>
									<div class="productBuild__name"><?php echo $item['build_name1'] ?></div>
								</div>
							<?php
							};
							?>
						</div>
					<?php
					}
					if ($build_step2) {
					?>
						<div class="productBuild__plate" data-plate="build-2">
							<?php
							foreach ($build_step2 as $item) {
							?>
								<div class="productBuild__item">
									<div class="productBuild__img"><?php echo wp_get_attachment_image($item['build_img2'], 'full') ?></div>
									<div class="productBuild__name"><?php echo $item['build_name2'] ?></div>
								</div>
							<?php
							};
							?>
						</div>
					<?php
					}
					if ($build_step3) {
					?>
						<div class="productBuild__plate" data-plate="build-3">
							<?php
							foreach ($build_step3 as $item) {
							?>
								<div class="productBuild__item">
									<div class="productBuild__img"><?php echo wp_get_attachment_image($item['build_img3'], 'full') ?></div>
									<div class="productBuild__name"><?php echo $item['build_name3'] ?></div>
								</div>
							<?php
							};
							?>
						</div>
					<?php
					}
					if ($build_step4) {
					?>
						<div class="productBuild__plate" data-plate="build-4">
							<?php
							foreach ($build_step4 as $item) {
							?>
								<div class="productBuild__item">
									<div class="productBuild__img"><?php echo wp_get_attachment_image($item['build_img4'], 'full') ?></div>
									<div class="productBuild__name"><?php echo $item['build_name4'] ?></div>
								</div>
							<?php
							};
							?>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<div>
			<img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/f8.png' ?>" alt="" data-revers="true">
		</div>
	</section>
	<!-- end productBuild -->
<?php } ?>

<?php
$recommended_list = SCF::get('recommended_list');
if ($recommended_list) {
	$products = get_posts([
		'posts_per_page' => -1,
		'post_type' => 'products',
		'post__in' => $recommended_list,
		'orderby' => 'post__in'
	]);
	// print_r($products);
?>
	<!-- begin productRecomend -->
	<section id="productRecomend" class="productRecomend section">
		<div class="container_center">
			<h2 class="section__title"><?php echo SCF::get('recommended_title'); ?></h2>
			<div class="productRecomend__list">
				<?php

				foreach ($products as $product) {
					$prodId = $product->ID;
					$scf = SCF::gets($prodId);
				?>
					<div class="productRecomend__item">
						<div class="productRecomend__title">
							<span>
								<?php echo get_the_title($prodId) ?>
							</span>
						</div>
						<div class="productRecomend__img">
							<?php echo wp_get_attachment_image($scf['product__photo'], 'full') ?>
						</div>
						<div class="productRecomend__descr">
							<?php echo $scf['product__ingredients'] ?>
						</div>
					</div>
				<?php
				};
				?>
			</div>
		</div>
	</section>
	<!-- end productRecomend -->
<?php } ?>

<!-- begin productContact -->
<section id="productContact" class="productContact section">
	<div class="container_center">
		<div class="productContact__content">
			<div class="productContact__left">
				<h2 class="section__title">Where to Enjoy Delicious Chimney Cake Ice Cream</h2>
				<div class="productContact__list">
					<div class="productContact__item">
						<div class="productContact__head">
							<div class="productContact__icon">
								<svg class="icon-point">
									<use xlink:href="<?php echo get_template_directory_uri() . '/img/sprite.svg#point' ?>"></use>
								</svg>
							</div>
							<div class="productContact__title">Hollywood</div>
						</div>
						<div class="productContact__text">
							<?php echo SCF::get_option_meta('our-contacts', 'contacts__addres'); ?>
						</div>
					</div>
					<div class="productContact__item">
						<div class="productContact__head">
							<div class="productContact__icon">
								<svg class="icon-point">
									<use xlink:href="<?php echo get_template_directory_uri() . '/img/sprite.svg#point' ?>"></use>
								</svg>
							</div>
							<div class="productContact__title">Venice</div>
						</div>
						<div class="productContact__text">
							<?php echo SCF::get_option_meta('our-contacts', 'contacts__addres2'); ?>
						</div>
					</div>
					<div class="productContact__item">
						<div class="productContact__head">
							<div class="productContact__icon">
								<svg class="icon-phone">
									<use xlink:href="<?php echo get_template_directory_uri() . '/img/sprite.svg#phone' ?>"></use>
								</svg>
							</div>
							<div class="productContact__title">Contact</div>
						</div>
						<div class="productContact__text">
							Promotional: <?php echo SCF::get_option_meta('our-contacts', 'contacts__email'); ?><br>
							General: <?php echo SCF::get_option_meta('our-contacts', 'contacts__email_general'); ?> <br>
							Phone Number: <?php echo SCF::get_option_meta('our-contacts', 'contacts__tel'); ?>
						</div>
					</div>
					<div class="productContact__item">
						<div class="productContact__head">
							<div class="productContact__icon">
								<svg class="icon-clock">
									<use xlink:href="<?php echo get_template_directory_uri() . '/img/sprite.svg#clock' ?>"></use>
								</svg>
							</div>
							<div class="productContact__title">Hours</div>
						</div>
						<div class="productContact__text">Open 7 Days a Week from noon until sellout</div>
					</div>
				</div>
			</div>
			<div class="productContact__img">
				<img src="<?php echo get_template_directory_uri() . '/img/product-contact.png' ?>" alt="">
			</div>
		</div>
	</div>
	<div>
		<img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/f9.png' ?>" alt="" data-revers="true">
		<img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/f10.png' ?>" alt="" data-revers="true">
		<img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/f11.png' ?>" alt="" data-revers="true">
	</div>
</section>
<!-- end productContact -->

<!-- begin productReview -->
<?php
$reviews = get_posts([
	'post_type' => 'reviews'
]);
if ($reviews) {
?>
	<section id="productReview" class="productReview section">
		<div class="productReview__bg">
			<img src="<?php echo get_template_directory_uri() . '/img/product-review.png' ?>" alt="">
		</div>
		<div class="container_center">
			<div class="productReview__content">
				<h2 class="section__title">Reviews</h2>
				<div class="review__slider">
					<div class="review__block">
						<div class="review__triangle"> </div>
						<div id="slideReview">
							<div class="swiper-wrapper">
								<?php
								foreach ($reviews as $key => $review) {
									$scf = SCF::gets($review->ID);
								?>
									<div class="swiper-slide">
										<p><?php
											echo $scf['review__text'];
											?></p>
										<div class="review__raiting">
											<?php
											for ($i = 0; $i < (int)$scf['review__stars']; $i++) {
												echo '<div class="review__star"> </div>';
											}
											?>
										</div>
									</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>
					<div class="review__button review__button--prev swiper-button-prev">
						<svg class="icon-arrow">
							<use xlink:href="<?php echo get_template_directory_uri() . '/img/sprite.svg#arrow' ?>"></use>
						</svg>
					</div>
					<div class="review__button review__button--next swiper-button-next">
						<svg class="icon-arrow">
							<use xlink:href="<?php echo get_template_directory_uri() . '/img/sprite.svg#arrow' ?>"></use>
						</svg>
					</div>
				</div>
				<div class="review__thumb">
					<div id="sliderReviewThumb">
						<div class="swiper-wrapper">
							<?php
							foreach ($reviews as $key => $review) {
								$scf = SCF::gets($review->ID);
							?>
								<div class="swiper-slide">
									<div class="review__photo">
										<?php echo wp_get_attachment_image($scf['review__photo'], 'full') ?>
									</div>
									<div class="review__name"><?php echo get_the_title($review->ID) ?></div>
								</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
<!-- end productReview -->