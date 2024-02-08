<div class="post">
	<div class="container_center">
		<div class="post__body">
			<aside class="post__aside desktop">
				<?php
				$tags = wp_get_post_tags(get_the_ID());
				// var_dump($tags);
				if ($tags) {
				?>
					<div class="post__tags">
						<?php
						foreach ($tags as $key => $tag) {
							$tag_meta = get_term_meta($tag->term_id);
							$tag_color = '#EC0187';
							if ($tag_meta && $tag_meta['tag_color']) {
								$tag_color = $tag_meta['tag_color'][0];
							}
						?>
							<div class="post__tag" style="background-color: <?php echo $tag_color ?>;"><?php echo $tag->name ?></div>
						<?php
						}
						?>
					</div>
				<?php
				}
				?>
				<div class="post__read">
					<div class="post__read_icon">
						<svg viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="29.5" cy="33.5" r="29.5" fill="#D92F84" />
							<circle cx="33.5" cy="29.5" r="28.5" fill="white" stroke="#D92F84" stroke-width="2" />
							<path d="M33 20.25C27.6141 20.25 23.25 24.6141 23.25 30C23.25 35.3859 27.6141 39.75 33 39.75C38.3859 39.75 42.75 35.3859 42.75 30C42.75 24.6141 38.3859 20.25 33 20.25ZM33.7969 30.7969H28.5V30H33V24H33.7969V30.7969Z" fill="#D92F84" />
						</svg>
					</div>
					<div class="post__read_text">
						<div class="post__read_label">Reading Time</div>
						<div class="post__read_time"><?php echo deesse_read_time(); ?></div>
					</div>
				</div>
			</aside>
			<article class="post__content">
				<h1 class="post__title"><?php the_title() ?></h1>
				<aside class="post__aside mobile">
					<?php
					$tags = wp_get_post_tags(get_the_ID());
					// var_dump($tags);
					if ($tags) {
					?>
						<div class="post__tags">
							<?php
							foreach ($tags as $tag) {
								$tag_meta = get_term_meta($tag->term_id);
								$tag_bg = '#EC0187';
								if ($tag_meta && $tag_meta['tag_color']) {
									$tag_bg = $tag_meta['tag_color'][0];
								}

							?>
								<div class="post__tag" style="background-color: <?php echo $tag_bg ?>;"><?php echo $tag->name ?></div>
							<?php
							}
							?>
						</div>
					<?php
					}
					?>
					<div class="post__read">
						<div class="post__read_icon">
							<svg viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="29.5" cy="33.5" r="29.5" fill="#D92F84" />
								<circle cx="33.5" cy="29.5" r="28.5" fill="white" stroke="#D92F84" stroke-width="2" />
								<path d="M33 20.25C27.6141 20.25 23.25 24.6141 23.25 30C23.25 35.3859 27.6141 39.75 33 39.75C38.3859 39.75 42.75 35.3859 42.75 30C42.75 24.6141 38.3859 20.25 33 20.25ZM33.7969 30.7969H28.5V30H33V24H33.7969V30.7969Z" fill="#D92F84" />
							</svg>
						</div>
						<div class="post__read_text">
							<div class="post__read_label">Reading Time</div>
							<div class="post__read_time"><?php echo deesse_read_time(); ?></div>
						</div>
					</div>
				</aside>
				<?php the_content() ?>
			</article>
		</div>
		<div class="post__foot">
			<div class="post__action">
				<button data-post-id="<?php echo get_the_ID(); ?>" id="like_btn" class="post__action_btn">
					<span class="post__action_icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="82" height="82" viewBox="0 0 82 82" fill="none">
							<circle cx="38.5" cy="43.5" r="38.5" fill="#D92F84" />
							<circle cx="43.5" cy="38.5" r="37.5" fill="white" stroke="#D92F84" stroke-width="2" />
							<path d="M49.7417 29C47.4531 29 45.3542 30.0046 44 31.6578C42.6458 30.0046 40.5469 29 38.2583 29C34.2568 29 31 32.0711 31 35.848C31 37.622 31.7177 39.3069 33.0245 40.5913L43.262 50.3006L44 51L44.738 50.3006L54.7792 40.7757C56.201 39.485 57 37.7301 57 35.848C57 32.0711 53.7432 29 49.7417 29Z" fill="#EC0187" />
						</svg>
					</span>
					<span id="like" class="post__action_label">
						<?php
						$likeCount = get_post_meta(get_the_ID(), 'like_list_count');
						if ($likeCount) {
							echo count($likeCount);
						} else {
							echo 'Like';
						}
						?>
					</span>
				</button>
			</div>
			<div class="post__action share">
				<button class="post__action_btn">
					<span class="post__action_icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="82" height="82" viewBox="0 0 82 82" fill="none">
							<circle cx="38.5" cy="43.5" r="38.5" fill="#D92F84" />
							<circle cx="43.5" cy="38.5" r="37.5" fill="white" stroke="#D92F84" stroke-width="2" />
							<path d="M56.1726 34.7648L47.7469 27.2507C47.1086 26.6245 46.3426 27.2507 46.3426 28.2526V32.0097C40.3425 32.0097 35.2361 35.6415 32.8105 40.5257C31.9169 42.1537 31.4062 43.907 31.0233 45.6603C30.7679 46.9127 32.6829 47.5389 33.4488 46.4117C36.2574 42.0285 40.9809 39.1481 46.3426 39.1481V43.2809C46.3426 44.2827 47.1086 44.9089 47.7469 44.2827L56.1726 36.7686C56.6832 36.2677 56.6832 35.2658 56.1726 34.7648Z" fill="#EC0187" />
						</svg>
						<div class="share__list">
							<div class="share__item">
								<a id="copy_link" rel="nofollow">
									<div class="share__icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" fill="none">
											<g clip-path="url(#clip0_834_1884)">
												<path d="M22.4475 1.45582C21.3787 0.485156 20.055 0 18.6975 0C17.34 0 15.984 0.485156 14.949 1.45582L13.323 2.9802C13.8896 3.26187 14.4281 3.59824 14.8946 4.03559C15.0126 4.14619 15.1158 4.26473 15.2225 4.38145L16.646 3.04692C17.1938 2.53301 17.8913 2.25 18.6975 2.25C19.4726 2.25 20.2013 2.5329 20.7491 3.04664C21.297 3.56027 21.5989 4.24336 21.5989 4.97004C21.5989 5.69672 21.297 6.3798 20.7491 6.89344L15.7504 11.5798C15.2063 12.0621 14.475 12.375 13.7025 12.375C12.93 12.375 12.1988 12.0921 11.6509 11.5784C11.1 11.0637 10.7663 10.3816 10.7663 9.65391C10.7663 8.92617 11.068 8.24414 11.616 7.73051L11.7825 7.60781C11.7038 7.4707 11.6213 7.33008 11.5013 7.21758C11.1788 6.91523 10.755 6.75 10.2975 6.75C9.85013 6.75 9.43125 6.91397 9.11213 7.20598C7.9605 9.10301 8.226 11.5513 9.95175 13.1685C10.9875 14.1398 12.345 14.625 13.7025 14.625C15.0593 14.625 16.416 14.1398 17.451 13.1692L22.4475 8.4832C23.5144 7.48301 24.0315 6.16254 23.9989 4.85156C23.9662 3.58945 23.4525 2.39625 22.4475 1.45582ZM8.775 13.6195L7.35375 14.952C6.80625 15.4371 6.075 15.75 5.3025 15.75C4.52737 15.75 3.79875 15.4671 3.25088 14.9534C2.703 14.4397 2.40112 13.7566 2.40112 13.03C2.40112 12.3033 2.70296 11.6202 3.25088 11.1066L8.24963 6.42023C8.79375 5.90625 9.49125 5.625 10.2975 5.625C11.1038 5.625 11.8013 5.90794 12.3491 6.42164C12.8974 6.93527 13.1989 7.61836 13.1989 8.34504C13.1989 9.07172 12.8971 9.7548 12.3491 10.2684L12.2175 10.3922C12.296 10.5307 12.3757 10.6697 12.4974 10.7842C12.8213 11.0848 13.2488 11.25 13.7025 11.25C14.1499 11.25 14.5688 11.086 14.8879 10.794C16.0395 8.89699 15.774 6.44871 14.0483 4.83152C12.9788 3.86016 11.655 3.375 10.2975 3.375C8.94 3.375 7.58625 3.86016 6.55125 4.83047L1.55288 9.5168C0.517875 10.4871 0 11.7591 0 13.031C-3.74998e-06 14.303 0.5175 15.5749 1.55288 16.5456C2.58788 17.5148 3.945 18 5.3025 18C6.65925 18 8.016 17.5148 9.051 16.5442L10.677 15.0198C10.1104 14.7381 9.57188 14.4018 9.10538 13.9644C8.985 13.8551 8.88375 13.7355 8.775 13.6195Z" fill="#D92F84" />
											</g>
											<defs>
												<clipPath id="clip0_834_1884">
													<rect width="24" height="18" fill="white" />
												</clipPath>
											</defs>
										</svg>
									</div>
									<span>Copy Link</span>
								</a>
							</div>
							<div class="share__item">
								<a onclick="Share.facebook('<?php the_permalink(); ?>','<?php the_title(); ?>','<?php echo get_the_post_thumbnail_url() ?>','')" rel="nofollow">
									<div class="share__icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<g clip-path="url(#clip0_834_1890)">
												<path d="M15.9975 3.985H18.1885V0.169C17.8105 0.117 16.5105 0 14.9965 0C11.8375 0 9.6735 1.987 9.6735 5.639V9H6.1875V13.266H9.6735V24H13.9475V13.267H17.2925L17.8235 9.001H13.9465V6.062C13.9475 4.829 14.2795 3.985 15.9975 3.985Z" fill="#D92F84" />
											</g>
											<defs>
												<clipPath id="clip0_834_1890">
													<rect width="24" height="24" fill="white" />
												</clipPath>
											</defs>
										</svg>
									</div>
									<span>Facebook</span>
								</a>
							</div>
							<div class="share__item">
								<a onclick="Share.instagram('<?php the_permalink(); ?>')" rel="nofollow">
									<div class="share__icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
											<g clip-path="url(#clip0_834_1892)">
												<path d="M15.3155 0H5.6845C2.55001 0 0 2.55001 0 5.6845V15.3156C0 18.4499 2.55001 21 5.6845 21H15.3156C18.4499 21 21 18.4499 21 15.3156V5.6845C21 2.55001 18.4499 0 15.3155 0ZM10.5 16.242C7.33377 16.242 4.75796 13.6662 4.75796 10.5C4.75796 7.33377 7.33377 4.75796 10.5 4.75796C13.6662 4.75796 16.242 7.33377 16.242 10.5C16.242 13.6662 13.6662 16.242 10.5 16.242ZM16.3793 6.11212C15.4436 6.11212 14.6826 5.35109 14.6826 4.41542C14.6826 3.47975 15.4436 2.71856 16.3793 2.71856C17.315 2.71856 18.0762 3.47975 18.0762 4.41542C18.0762 5.35109 17.315 6.11212 16.3793 6.11212Z" fill="#D92F84" />
												<path d="M10.4992 5.98926C8.01198 5.98926 5.98828 8.0128 5.98828 10.5002C5.98828 12.9874 8.01198 15.0111 10.4992 15.0111C12.9866 15.0111 15.0101 12.9874 15.0101 10.5002C15.0101 8.0128 12.9866 5.98926 10.4992 5.98926Z" fill="#D92F84" />
												<path d="M16.3797 3.9502C16.123 3.9502 15.9141 4.15912 15.9141 4.41579C15.9141 4.67245 16.123 4.88138 16.3797 4.88138C16.6365 4.88138 16.8454 4.67261 16.8454 4.41579C16.8454 4.15896 16.6365 3.9502 16.3797 3.9502Z" fill="#D92F84" />
											</g>
											<defs>
												<clipPath id="clip0_834_1892">
													<rect width="21" height="21" fill="white" />
												</clipPath>
											</defs>
										</svg>
									</div>
									<span>Instagram</span>
								</a>
							</div>
							<div class="share__item">
								<a onclick="Share.twitter('<?php the_permalink(); ?>','<?php the_title(); ?>')" rel="nofollow">
									<div class="share__icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
											<path d="M24 2.36749C23.1177 2.76965 22.1682 3.04092 21.1719 3.16231C22.1891 2.53784 22.9691 1.54868 23.3369 0.368687C22.3855 0.947694 21.3322 1.36784 20.2102 1.59464C19.3123 0.613478 18.0325 0 16.6163 0C13.8973 0 11.6928 2.26058 11.6928 5.04921C11.6928 5.44437 11.7362 5.82954 11.8205 6.19973C7.72815 5.98891 4.09963 3.97912 1.67103 0.924214C1.24718 1.66958 1.00457 2.53684 1.00457 3.46306C1.00457 5.21457 1.8737 6.76025 3.19493 7.66548C2.38816 7.63901 1.62865 7.4117 0.964618 7.03352C0.964131 7.0545 0.964131 7.07599 0.964131 7.09747C0.964131 9.54339 2.66147 11.5837 4.9142 12.0483C4.50107 12.1632 4.06601 12.2251 3.61683 12.2251C3.29919 12.2251 2.9908 12.1936 2.69021 12.1342C3.31722 14.14 5.13538 15.6002 7.28969 15.6407C5.60453 16.9951 3.48188 17.8024 1.17459 17.8024C0.777541 17.8024 0.38536 17.7784 0 17.7314C2.17965 19.1647 4.76755 20 7.5479 20C16.6051 20 21.5573 12.3065 21.5573 5.63421C21.5573 5.4154 21.5529 5.19708 21.5436 4.98027C22.5053 4.26987 23.3404 3.38013 24 2.36749Z" fill="#D92F84" />
										</svg>
									</div>
									<span>Twitter</span>
								</a>
							</div>
						</div>
					</span>
					<span class="post__action_label">Share</span>
				</button>
			</div>
		</div>
	</div>
	<script>
		window.onload = () => {

			document.querySelector('#copy_link').addEventListener('click', function(e) {
				e.preventDefault();
				const text = this.querySelector('span');
				var inputc = this.appendChild(document.createElement("input"));
				inputc.value = window.location.href;
				inputc.focus();
				inputc.select();
				document.execCommand('copy');
				inputc.parentNode.removeChild(inputc);
				text.innerHTML = 'URL Copied';

				setTimeout(() => {
					text.innerHTML = 'Copy Link';
				}, 3000);
			})

			function share() {
				Share = {
					// vkontakte: function(purl, ptitle, pimg, text) {
					// 	url = 'http://vkontakte.ru/share.php?';
					// 	url += 'url=' + encodeURIComponent(purl);
					// 	url += '&title=' + encodeURIComponent(ptitle);
					// 	url += '&description=' + encodeURIComponent(text);
					// 	url += '&image=' + encodeURIComponent(pimg);
					// 	url += '&noparse=true';
					// 	Share.popup(url);
					// },
					// odnoklassniki: function(purl, text) {
					// 	url = 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1';
					// 	url += '&st.comments=' + encodeURIComponent(text);
					// 	url += '&st._surl=' + encodeURIComponent(purl);
					// 	Share.popup(url);
					// },
					facebook: function(purl, ptitle, pimg, text) {
						url = 'http://www.facebook.com/sharer.php?s=100';
						url += '&p[title]=' + encodeURIComponent(ptitle);
						url += '&p[summary]=' + encodeURIComponent(text);
						url += '&p[url]=' + encodeURIComponent(purl);
						url += '&p[images][0]=' + encodeURIComponent(pimg);
						Share.popup(url);
					},
					twitter: function(purl, ptitle) {
						url = 'http://twitter.com/share?';
						url += 'text=' + encodeURIComponent(ptitle);
						url += '&url=' + encodeURIComponent(purl);
						url += '&counturl=' + encodeURIComponent(purl);
						Share.popup(url);
					},
					// mailru: function(purl, ptitle, pimg, text) {
					// 	url = 'http://connect.mail.ru/share?';
					// 	url += 'url=' + encodeURIComponent(purl);
					// 	url += '&title=' + encodeURIComponent(ptitle);
					// 	url += '&description=' + encodeURIComponent(text);
					// 	url += '&imageurl=' + encodeURIComponent(pimg);
					// 	Share.popup(url)
					// },
					instagram: function(purl, ptitle, pimg, text) {
						url = 'https://www.instagram.com/?';
						url += 'url=' + encodeURIComponent(purl);
						Share.popup(url)
					},

					popup: function(url) {
						window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
					}
				};

			}
			share();
			$('#like_btn').on('click', function(e) {
				if ($(this).attr('disabled')) return;
				e.preventDefault();
				$(this).addClass('active');
				$(this).attr('disabled', true);
				let postID = $(this).attr("data-post-id");
				// console.log(postID);
				let likeCounter = $('#like').html().replace(/\s/g, '');
				let num = isNaN(+likeCounter) ? 0 : +likeCounter;
				$('#like').html(++num);
				data = {
					'action': 'frontendie_add_like',
					'postID': postID,
					'likeCount': num
				}
				$.ajax({
					type: 'post',
					url: '<?php echo admin_url("admin-ajax.php") ?>',
					data: data,
					cache: false,
					success: function(data) {
						console.log(data);
					},
					error: (err) => {
						console.log(err);
					}
				});
			});
		}
	</script>
	<?php
	$rnd_post = get_posts([
		'numberposts' => 1,
		'orderby' => 'rand',
		'post_type' => 'post',
		'exclude' => get_the_ID(),
	]);
	if ($rnd_post) {
		foreach ($rnd_post as $post) {
			setup_postdata($post);
	?>
			<!-- Вывод постов, функции цикла: the_title() и т.д. -->
			<div class="singlePost singlePost_inverse" style="margin: 0">
				<div class="singlePost__img">
					<?php the_post_thumbnail('full') ?>
				</div>
				<div class="singlePost__content">
					<h2 class="singlePost__title"><?php the_title() ?></h2>
					<div class="singlePost__text">
						<?php the_excerpt() ?>
					</div>
					<a href="<?php the_permalink() ?>" class="singlePost__more">
						Read more
					</a>
				</div>
			</div>
	<?php
		}
	}
	wp_reset_postdata();
	?>
</div>