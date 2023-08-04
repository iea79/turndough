<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frondendie
 */

get_header();

if (is_front_page()) {
	// echo 'home';
	get_template_part('template-parts/content', 'home');
} else {
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', get_post_type());

	endwhile; // End of the loop.
}

get_footer();
