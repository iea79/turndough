<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frondendie
 */

get_header();

// if (!defined('MENU_PAGE_ID')) {
// 	$current_page = get_page_by_path('menu');
// 	// var_dump($current_page->ID);
// 	define('MENU_PAGE_ID', $current_page->ID);
// } 

$ids = SCF::get('menu_cat', 239);
// $meta = SCF::gets(MENU_PAGE_ID);

$ids = [];
$cats = get_terms('product-category', [
	'hide_empty' => true,
	'include'	 => $ids,
	'orderby' 	 => 'count',
	'order' => 'ASK',
]);


// var_dump($cats);

?>

<div class="menue">
	<?php
	foreach ($cats as $key => $cat) {
		$cat_meta = get_term_meta($cat->term_id);
		$cat_color = $cat_meta['cat_color'][0];
		$cat_img = $cat_meta['cat_img'][0];
		$cat_bg = $cat_meta['cat_bg'][0];
		$cat_contrast = $cat_meta['cat_page_contrast'][0] ?? '';
		// var_dump($cat);
	?>
		<!-- catalog-->
		<section class="catalog" id="<?php echo $cat->slug ?>">
			<div class="catalog__head <?php echo $cat_contrast ?>">
				<?php
				switch ($key) {
					case '1':
				?>
						<div class="catalog__fly-4"> <img class="js-parallaxMouse" role="img" src="<?php echo get_template_directory_uri() . '/img/flying/img-11.png' ?>" alt="" data-revers="true"></div>
					<?php
						break;

					case '2':
					?>
						<div class="catalog__fly-5"> <img class="js-parallaxMouse" role="img" src="<?php echo get_template_directory_uri() . '/img/flying/img-15.png' ?>" alt="" data-revers="true"></div>
					<?php
						break;

					case '3':
					?>
						<div class="catalog__fly-6"> <img class="js-parallaxMouse" role="img" src="<?php echo get_template_directory_uri() . '/img/flying/img-16.png' ?>" alt="" data-revers="true"></div>
						<div class="catalog__fly-7"> <img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-17.png' ?>" alt=""></div>
				<?php
						break;

					default:
						echo '';
						break;
				}
				?>
				<div class="catalog__bg"> <?php echo wp_get_attachment_image($cat_bg, 'full', null, array('role' => 'img')) ?></div>
				<div class="wrapper">
					<div class="catalog__content">
						<h2 class="catalog__title"><?php echo $cat->name ?></h2>
						<p><?php echo $cat->description ?></p>
					</div>
					<div class="catalog__img"> <?php echo wp_get_attachment_image($cat_img, 'full', null, array('role' => 'img')) ?></div>
				</div>
			</div>
			<div class="catalog__cards">
				<?php
				switch ($key) {
					case '3':
				?>
						<div class="catalog__fly-7"> <img class="js-parallaxMouse" role="img" src="<?php echo get_template_directory_uri() . '/img/flying/img-15.png' ?>" alt="" data-revers="true"></div>
						<div class="catalog__fly-8"><img class="js-parallaxMouse" role="img" src="<?php echo get_template_directory_uri() . '/img/flying/img-18.png' ?>" alt="" data-revers="true"></div>
					<?php
						break;

					default:
					?>
						<div class="catalog__fly-1"> <img class="js-parallaxMouse" role="img" src="<?php echo get_template_directory_uri() . '/img/flying/img-12.png' ?>" alt="" data-revers="true"></div>
						<div class="catalog__fly-2"> <img class="js-parallaxMouse" role="img" src="<?php echo get_template_directory_uri() . '/img/flying/img-13.png' ?>" alt=""></div>
						<div class="catalog__fly-3"><img class="js-parallaxMouse" role="img" src="<?php echo get_template_directory_uri() . '/img/flying/img-14.png' ?>" alt="" data-revers="true"></div>
				<?php
						break;
				}
				?>
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
									'terms'    => $cat->term_id
								)
							),
						]);
						if ($products->have_posts()) {
							while ($products->have_posts()) {
								$products->the_post();
								$product_meta = get_post_meta(get_the_ID());
								$product_img = $product_meta['product__photo'][0];
								$product_text = $product_meta['product__text'][0];
								// var_dump($post);
						?>
								<div class="catalog__col" id="<?php echo $cat->slug . '-' . get_the_id() ?>">
									<!-- product-card-->
									<div class="product-card">
										<a href="<?php echo get_the_permalink() ?>" class="product-card__img" style="background-color: <?php echo $cat_color; ?>;"> <?php echo wp_get_attachment_image($product_img, 'full', null, array('role' => 'img')) ?></a>
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
		</section>
		<!-- end catalog-->
	<?php
		wp_reset_postdata();
	}
	?>
</div>
<?php
include get_template_directory() . '/inc/contact.php';
get_footer();
