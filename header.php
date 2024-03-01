<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package frondendie
 */

$menu_page = '/menu/';
$story_page = '/our-story/';
$vehicle_link = 'https://maps.app.goo.gl/QQdyqpk88Sy21ohT7';
$hollywood_link = 'https://maps.app.goo.gl/K5AVCpTACB5uX4bQ6';
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.cdnfonts.com">
	<link rel="stylesheet" type="text/css" href="https://fonts.cdnfonts.com/css/alokary" />

	<?php wp_head(); ?>
	<script>
		(function() {
			var s = document.createElement('script');
			var h = document.querySelector('head') || document.body;
			s.src = 'https://acsbapp.com/apps/app/dist/js/app.js';
			s.async = true;
			s.onload = function() {
				acsbJS.init({
					statementLink: '',
					footerHtml: 'TurnDough Web Accessibility',
					hideMobile: false,
					hideTrigger: false,
					disableBgProcess: false,
					language: 'en',
					position: 'left',
					leadColor: '#ec0187',
					triggerColor: '#ec1087',
					triggerRadius: '50%',
					triggerPositionX: 'right',
					triggerPositionY: 'bottom',
					triggerIcon: 'help',
					triggerSize: 'medium',
					triggerOffsetX: 20,
					triggerOffsetY: 20,
					mobile: {
						triggerSize: 'small',
						triggerPositionX: 'right',
						triggerPositionY: 'bottom',
						triggerOffsetX: 10,
						triggerOffsetY: 10,
						triggerRadius: '50%'
					}
				});
			};
			h.appendChild(s);
		})();
	</script>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<!-- <div class="page"> -->
	<!-- header-->
	<header class="header" id="headerSticky" role="banner">
		<div class="wrapper">
			<div class="header__btns">
				<div class="header__btn desktop">
					<a class="btn" role="link" title="Link to story" href="<?php echo $story_page ?>">
						<img src="<?php echo get_template_directory_uri() . '/img/mcream.svg' ?>" alt="">
						<span>Our story</span>
					</a>
				</div>
				<div class="header__btn">
					<a class="btn" role="link" title="Link to menu" href="<?php echo $menu_page ?>">
						<img src="<?php echo get_template_directory_uri() . '/img/mmenu.svg' ?>" alt="">
						<span>Our menu</span>
					</a>
				</div>
			</div>
			<div class="header__logo">
				<?php echo get_custom_logo() ?>
			</div>
			<div class="header__btns">
				<div class="header__btn mobile">
					<a class="btn" role="link" title="Link to story" href="<?php echo $story_page ?>">
						<img src="<?php echo get_template_directory_uri() . '/img/mcream.svg' ?>" alt="">
						<span>Our story</span>
					</a>
				</div>
				<div class="header__btn desktop">
					<a class="btn" role="link" title="Link to menu" href="<?php echo $vehicle_link ?>">
						<img src="<?php echo get_template_directory_uri() . '/img/mpoint.svg' ?>" alt="">
						<span>Venice Beach</span>
					</a>
				</div>
				<div class="header__btn desktop">
					<a class="btn" role="link" title="Link to menu" href="<?php echo $hollywood_link ?>">
						<img src="<?php echo get_template_directory_uri() . '/img/mpoint.svg' ?>" alt="">
						<span>Hollywood Blvd</span>
					</a>
				</div>
			</div>
		</div>
		<div class="header__bottom mobile">
			<div class="header__btn ">
				<a class="btn" role="link" title="Link to menu" href="<?php echo $vehicle_link ?>">
					<img src="<?php echo get_template_directory_uri() . '/img/mpoint.svg' ?>" alt="">
					<span>Venice Beach</span>
				</a>
			</div>
			<div class="header__btn ">
				<a class="btn" role="link" title="Link to menu" href="<?php echo $hollywood_link ?>">
					<img src="<?php echo get_template_directory_uri() . '/img/mpoint.svg' ?>" alt="">
					<span>Hollywood Blvd</span>
				</a>
			</div>

		</div>
	</header>
	<!--	/header-->
	<main class="content" role="main">