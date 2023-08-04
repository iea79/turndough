<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package frondendie
 */

?>

</div>
<!-- footer-->
<footer class="footer">
	<div class="footer__fly"> <img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-10.png' ?>" alt="" data-revers="true"></div>
	<div class="wrapper">
		<div class="footer__text">Copyright © <?php echo date('Y') ?> Turn Dough - All Rights Reserved.</div>
		<div class="footer__social">
			<div class="footer__social-row">
				<a class="footer__social-icon" href="<?php echo SCF::get_option_meta('our-contacts', 'contacts__facebook'); ?>" aria-label="Facebook link">
					<svg class="icon-facebook">
						<use xlink:href="<?php echo get_template_directory_uri() . '/img/sprite.svg#facebook' ?>"></use>
					</svg>
				</a>
				<a class="footer__social-icon" href="<?php echo SCF::get_option_meta('our-contacts', 'contacts__instagram'); ?>" aria-label="Instagram link">
					<svg class="icon-instagram">
						<use xlink:href="<?php echo get_template_directory_uri() . '/img/sprite.svg#instagram' ?>"></use>
					</svg>
				</a>
				<a class="footer__social-icon" href="<?php echo SCF::get_option_meta('our-contacts', 'contacts__twitter'); ?>" aria-label="Twitter link">
					<svg class="icon-twitter">
						<use xlink:href="<?php echo get_template_directory_uri() . '/img/sprite.svg#twitter' ?>"></use>
					</svg>
				</a>
			</div>
		</div>
		<a href="https://desseemedia.com" class="footer__text">Made by Deesse Media</a>
	</div>
</footer>
<!--	/footer-->
</div>

<?php wp_footer(); ?>

</body>

</html>