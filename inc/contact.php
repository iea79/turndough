<!-- contact-->
<div class="contact">
	<div class="contact__fly"> <img class="js-parallaxMouse" src="<?php echo get_template_directory_uri() . '/img/flying/img-9.png' ?>" alt="" data-revers="true"></div>
	<div class="wrapper">
		<div class="contact__content">
			<div class="subtitle subtitle--pink">Where Iconic Locations Meet Delicious Delights</div>
			<!-- <div class="subtitle subtitle--white">Where Iconic Locations Meet Delicious Delights</div> -->
			<div class="contact__sub">Our stores are perfectly situated in two iconic and vibrant locations: the sun-kissed Venice Boardwalk and the world-famous Hollywood Walk of Fame.</div>
			<div class="contact__buttons">
				<div class="contact__btn active">
					<div class="contact__btn-icon">
						<svg class="icon-point">
							<use xlink:href="<?php echo get_template_directory_uri() . '/img/sprite.svg#point' ?>"></use>
						</svg>
					</div><span>Hollywood</span>
				</div>
				<div class="contact__btn">
					<div class="contact__btn-icon">
						<svg class="icon-point">
							<use xlink:href="<?php echo get_template_directory_uri() . '/img/sprite.svg#point' ?>"></use>
						</svg>
					</div><span>Venice</span>
				</div>
			</div>
			<div class="contact__block open" data-num="0">
				<div class="contact__text">
					<h3>Turn Dough</h3>
					<p><?php echo SCF::get_option_meta('our-contacts', 'contacts__addres'); ?></p>
				</div>
				<div class="contact__text">
					<h3>Contact information</h3>
					<p>Promotional: <a href="mailto:<?php echo SCF::get_option_meta('our-contacts', 'contacts__email'); ?>"><?php echo SCF::get_option_meta('our-contacts', 'contacts__email'); ?></a><br>
						General: <a href="mailto: <?php echo SCF::get_option_meta('our-contacts', 'contacts__email_general'); ?>"><?php echo SCF::get_option_meta('our-contacts', 'contacts__email_general'); ?></a> <br>Phone Number: <a href="tel: <?php echo SCF::get_option_meta('our-contacts', 'contacts__tel'); ?>"><?php echo SCF::get_option_meta('our-contacts', 'contacts__tel'); ?></a></p>
				</div>
				<div class="contact__text">
					<h3>Hours</h3>
					<p>Open 7 Days a Week from noon until sellout</p>
				</div>
			</div>
			<div class="contact__block" data-num="1">
				<div class="contact__text">
					<h3>Turn Dough</h3>
					<p><?php echo SCF::get_option_meta('our-contacts', 'contacts__addres2'); ?></p>
				</div>
				<div class="contact__text">
					<h3>Contact information</h3>
					<p>Promotional: <a href="mailto: <?php echo SCF::get_option_meta('our-contacts', 'contacts__email2'); ?>"><?php echo SCF::get_option_meta('our-contacts', 'contacts__email2'); ?></a><br> General: <a href="mailto:<?php echo SCF::get_option_meta('our-contacts', 'contacts__email_general2'); ?>"><?php echo SCF::get_option_meta('our-contacts', 'contacts__email_general2'); ?></a><br> Phone Number: <a href="tel: <?php echo SCF::get_option_meta('our-contacts', 'contacts__tel2'); ?>"><?php echo SCF::get_option_meta('our-contacts', 'contacts__tel2'); ?></a></p>
				</div>
				<div class="contact__text">
					<h3>Hours</h3>
					<p>Open 7 Days a Week from noon until sellout</p>
				</div>
			</div>
		</div>
	</div>
	<div class="contact__map">
		<div id="map"> </div>
	</div>
</div>