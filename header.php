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
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="page">
		<!-- header-->
		<header class="header" id="headerSticky">
			<div class="wrapper">
				<div class="header__btn"><a class="btn" href="/our-story/"> <span>Our story</span></a></div>
				<div class="header__logo">
					<?php echo get_custom_logo() ?>
				</div>
				<div class="header__btn"> <a class="btn" href="/menu/">Our menu</a></div>
			</div>
		</header>
		<!--	/header-->
		<div class="content">