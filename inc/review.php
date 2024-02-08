<!-- begin productReview -->
<?php
$reviewIds = SCF::get('review_ids');
$reviews = get_posts([
	'post_type' => 'reviews'
]);
// var_dump($reviewIds);
// var_dump($reviews);
if ($reviewIds) {
	$reviews = get_posts([
		'post_type' => 'reviews',
		'include'   => $reviewIds,
		'orderby'   => 'post__in'
	]);
};
if ($reviews) {
?>
	<section id="productReview" class="productReview section">
		<div class="productReview__bg">
			<?php echo wp_get_attachment_image(SCF::get_option_meta('our-backgrounds', 'backgrounds__reviews'), 'full') ?>
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