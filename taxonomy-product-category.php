<?php
get_header();
$cat = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$cat_ID = $cat->term_id;
$cat_meta = SCF::get_term_meta($cat_ID, 'product-category');
$cat_color = $cat_meta['cat_color'];
$cat_img = $cat_meta['cat_img'];
$cat_bg = $cat_meta['cat_bg'];
$cat_bg_single = $cat_meta['cat_page_bg'];
$cat_title = $cat_meta['cat_descr_title'];
$cat_description = $cat_meta['cat_descr'];
$cat_contrast = $cat_meta['cat_page_contrast'][0] ?? '';
?>
<div class="catalog catalogSingle">
	<div class="catalog__head <?php echo $cat_contrast ?>">
		<div class="catalogSingle__fly"> <img class="js-parallaxMouse" role="img" src="<?php echo get_template_directory_uri() . '/img/flying/catalog-single.svg' ?>" alt="" data-revers="true"></div>

		<div class="catalog__bg">
			<?php
			if ($cat_bg_single) {
				echo wp_get_attachment_image($cat_bg_single, 'full', null, array('role' => 'img'));
			} else {
				echo wp_get_attachment_image($cat_bg, 'full', null, array('role' => 'img'));
			}
			?>
		</div>
		<div class="wrapper">
			<div class="catalog__content">
				<div class="breadcrumb">
					<a href="/">Main</a> /
					<a href="/">Our Menu</a> /
					<span><?php echo $cat->name ?></span>
				</div>
				<h2 class="catalog__title"><?php echo $cat->name ?></h2>
				<p><?php echo $cat->description ?></p>
			</div>
			<div class="catalog__img"> <?php echo wp_get_attachment_image($cat_img, 'full', null, array('role' => 'img')) ?></div>
		</div>
	</div>
	<div class="catalog__cards">
		<div class="wrapper">
			<div class="row">
				<?php
				$products = new WP_Query([
					'posts_per_page' => -1,
					'post_type' => 'products',
					'tax_query' => array(
						array(
							'taxonomy' => 'product-category',
							'field'    => 'id',
							'terms'    => $cat_ID
						)
					),
				]);
				if ($products->have_posts()) {
					while ($products->have_posts()) {
						$products->the_post();
						$product_meta = get_post_meta(get_the_ID());
						$product_img = $product_meta['product__photo'][0];
						$product_cat_img = $product_meta['product__cat_img'][0] ?? null;
						$product_text = $product_meta['product__text'][0];
						// var_dump($product_meta);
						// var_dump($post);
				?>
						<div class="catalog__col" id="<?php echo $cat->slug . '-' . get_the_id() ?>">
							<!-- product-card-->
							<div class="product-card">
								<a href="<?php echo get_the_permalink() ?>" class="product-card__img" style="background-color: <?php echo $cat_color; ?>;">
									<?php if (!$product_cat_img) : ?>
										<?php echo wp_get_attachment_image($product_img, 'full', null, array('role' => 'img')) ?>
									<?php else : ?>
										<?php echo wp_get_attachment_image($product_cat_img, 'full', null, array('role' => 'img')) ?>
									<?php endif; ?>
								</a>
								<div class="product-card__content">
									<h3 role="heading" aria-level="2" style="color: <?php echo $cat_color; ?>;"><a href="<?php echo get_the_permalink() ?>"><?php the_title() ?></a></h3>
									<?php echo $product_text; ?>
								</div>
							</div>
							<!-- /product-card-->
						</div>

						<?php
						?>
				<?php
					}
				}
				?>
			</div>
		</div>
	</div>
	<?php if ($cat_title) : ?>
		<div class="wrapper">
			<div class="catalog__foot">
				<div class="catalog__foot_title"><?php echo $cat_title ?></div>
				<div class="catalog__foot_text"><?php echo $cat_description ?></div>
			</div>
		</div>
	<?php endif; ?>

</div>
<?php
get_footer();
?>