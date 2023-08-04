<?php
get_header();
$reviews = get_posts([
	'post_type' => 'reviews'
]);
?>
<div class="review">
	<div class="review__bg"> <img src="<?php echo get_template_directory_uri() . '/img/review-bg.jpg' ?>" alt=""></div>
	<div class="wrapper">
		<div class="review__title">What Our Customers Say About Us</div>
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
<!-- /review-->

<?php
get_footer();
?>