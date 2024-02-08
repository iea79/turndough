<?php
get_header();
$postsIds = SCF::get('blog_list');
$img1 = SCF::get('blog_img1');
$img2 = SCF::get('blog_img2');
$i = 0;
global $post;

$query = new WP_Query([
	'posts_per_page' => 10,
	'post_type'      => 'post',
	'orderby'        => 'post__in',
	'post__in'		 => $postsIds
]);
?>
<div class="blog">
	<div class="container_center">
		<h1 class="page__title">Stories & Ideas</h1>

		<div class="blog__list">
			<?php

			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post();
			?>
					<div class="blog__item">
						<?php
						if ($i == 1) {
						?>
							<div class="blog__thumb"><?php echo wp_get_attachment_image($img1, 'full') ?></div>
						<?php
						} else if ($i == 8) {
						?>
							<div class="blog__thumb"><?php echo wp_get_attachment_image($img2, 'full') ?></div>
						<?php
						} else {
						?>
							<a href="<?php the_permalink() ?>" class="blog__thumb"><?php the_post_thumbnail("full") ?></a>
						<?php
						}
						?>
						<div class="blog__tags">
							<?php
							$tags = wp_get_post_tags(get_the_ID());
							foreach ($tags as $tag) {
								$tag_meta = get_term_meta($tag->term_id);
								$tag_bg = '#EC0187';
								if ($tag_meta && $tag_meta['tag_color']) {
									$tag_bg = $tag_meta['tag_color'][0];
								}

							?><div class="blog__tag" style="background-color: <?php echo $tag_bg ?>;"><?php echo $tag->name ?></div><?php
																																}
																																	?>
						</div>
						<div class="blog__content">
							<div class="blog__title"><?php the_title() ?></div>
							<div class="blog__text"><?php echo get_the_excerpt(get_the_ID()) ?></div>
							<a href="<?php the_permalink() ?>" class="blog__more">Read more</a>
						</div>
					</div>
					<?php
					$i++;
					?>

			<?php
				}
			} else {
			}

			?>
		</div>
	</div>
</div>
<?php
wp_reset_postdata(); // Сбрасываем $post
get_footer();
?>