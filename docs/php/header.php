<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?></title>

	<link rel="stylesheet" href="<?= B_FONTS_DIR; ?>/Montserrat/stylesheet.css">
	<link rel="stylesheet" href="<?= B_FONTS_DIR; ?>/HelveticaNeueCyr/stylesheet.css">
	<link rel="stylesheet" href="<?= B_FONTS_DIR; ?>/Raleway/stylesheet.css">
	<link rel="stylesheet" href="<?= B_FONTS_DIR; ?>/GothamPro/stylesheet.css">

	<!-- Libraries CSS -->
	<link rel="stylesheet" href="<?= B_JS_DIR; ?>/libs/aos.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?= B_CSS_DIR; ?>/main.css">

  <?php wp_head(); ?>
</head>
<body>

	<header id="header_main">
		<div class="wrapper">
			<a href="#" class="logo_delicate loading">
				<svg>
					<use xlink:href="<?= B_IMG_DIR; ?>/icons.svg#logo_delicate"></use>
				</svg>
			</a>

			<nav>
				<ul class="nav_list">
					<?php while ( have_rows('header_links', 'options')): the_row();
						$main_link = get_sub_field('link')['main_link'];
						$sublinks = get_sub_field('link')['sublinks'];
					?>
						<li class="nav_item">
							<a class="nav_link" href="<?= $main_link['url']; ?>">
								<?= $main_link['title']; ?>
								<?php if(!empty($sublinks)) { ?>
									<svg>
										<use class="arrow_down" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_down"></use>
									</svg>
									</a>
									<ul class="nav_sublist">
										<?php foreach($sublinks as $sublink) { ?>
											<li class="nav_subItem"><a href="<?= $sublink['sublink']['url']; ?>" class="nav_subLink">
												<?= $sublink['sublink']['title']; ?>
											</a></li>
										<?php } ?>
									</ul>
								<?php } else { ?>
							</a>
							<?php } ?>
						</li>
					<?php endwhile; ?>
				</ul>
			</nav>

			<div class="phones">
				<p>Телефон:</p>
				<?php while ( have_rows('phones', 'options')): the_row();
					$phone = str_replace(str_split(' ()+-'), '', get_sub_field('phone'));
				?>
					<a href="tel:<?= $phone; ?>">
						<?= get_sub_field('phone'); ?>
					</a>
				<?php endwhile; ?>
			</div>

			<div class="schedule">
				<p>График работы:</p>
				<span>
					<?= get_field('schedule', 'options'); ?>
				</span>
			</div>

			<div class="socials">
				<?php while ( have_rows('socials', 'options')): the_row();
					if (get_sub_field('show')) {
				?>
					<a href="<?= get_sub_field('social_link'); ?>">
						<svg width="38" height="38">
							<use class="social_icon" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#<?= get_sub_field('social_type'); ?>"></use>
						</svg>
					</a>
				<?php } endwhile; ?>
			</div>

			<button class="button open-request loading">
				<span class="button__background"></span>
				<span class="text">Записаться</span>
				<span class="button__shine"></span>
			</button>

			<button id="expand_menu">
				<svg class="hamb" width="20" height="20">
					<use xlink:href="<?= B_IMG_DIR; ?>/icons.svg#hamb"></use>
				</svg>
				<svg class="close" width="20" height="20">
					<use xlink:href="<?= B_IMG_DIR; ?>/icons.svg#close"></use>
				</svg>
			</button>

		</div>
	</header>

	<header id="header_mobile">
		<div class="wrapper">
			<nav>
				<ul class="nav_list">
					<?php while ( have_rows('header_links', 'options')): the_row();
						$main_link = get_sub_field('link')['main_link'];
						$sublinks = get_sub_field('link')['sublinks'];
					?>
						<li class="nav_item">
							<a class="nav_link" href="<?= $main_link['url']; ?>">
								<?= $main_link['title']; ?>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			</nav>
			<div class="slogan">
				<a href="#">
					<svg>
						<use class="logo_delicate" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#logo_delicate"></use>
					</svg>
				</a>
				<div class="dash"></div>
				<h4 class="slogan_text">
					<?= get_field('slogan', 'options'); ?>
				</h4>
			</div>
			<div class="contacts">
				<div class="phones">
					<?php while ( have_rows('phones', 'options')): the_row();
						$phone = str_replace(str_split(' ()+-'), '', get_sub_field('phone'));
					?>
						<a href="tel:<?= $phone; ?>">
							<svg class="stroke">
								<use xlink:href="<?= B_IMG_DIR; ?>/icons.svg#phone"></use>
							</svg>
							<?= get_sub_field('phone'); ?>
						</a>
					<?php endwhile; ?>
				</div>
				<div class="address">
					<svg class="stroke" width="24" height="24">
						<use xlink:href="<?= B_IMG_DIR; ?>/icons.svg#map"></use>
					</svg>
					<div>
						<p>
							<?= get_field('address', 'options'); ?>
						</p>
					</div>
				</div>
				<div class="schedule">
					<svg class="stroke" width="25" height="25">
						<use xlink:href="<?= B_IMG_DIR; ?>/icons.svg#calendar"></use>
					</svg>
					<div>
						<span>Работаем:</span>
						<p>
							<?= get_field('schedule', 'options'); ?>
						</p>
					</div>
				</div>
				<div class="socials">
					<?php while ( have_rows('socials', 'options')): the_row();
						$type = get_sub_field('social_type');
						$link = get_sub_field('social_link');
						if ($type == 'telegram') {
							$link = 'https://telegram.me/' . $link;
						} else if ($type == 'viber') {
							$link = 'viber://' . (wp_is_mobile() ? 'add?number=' : 'chat?number=+') . str_replace(str_split(' ()+-'), '', $link);
						} else if ($type == 'whatsapp') {
							$link = 'https://api.whatsapp.com/send?phone=' . $link;
						}
					?>
						<a href="<?= $link; ?>"><svg class="<?= $type === 'facebook' ? 'stroke' : ''; ?>" width="28" height="28"><use xlink:href="<?= B_IMG_DIR; ?>/icons.svg#<?= $type; ?>"></use></svg></a>
					<?php endwhile; ?>
				</div>
			</div>
			<div class="bottom">
				<div class="copyright">© Delicate Car Wash 2018-2021</div>
				<div class="development">
					<p>Создание сайта  —</p>
					<a href="https://devpro.agency/">
						<svg class="native" viewBox="5 6 94 26" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M84.6437 11.1747H80.4319V9.97132H84.6585C84.9972 9.95682 85.2623 10.2178 85.277 10.5512C85.2917 10.8847 85.0266 11.1602 84.6879 11.1747C84.6732 11.1747 84.6585 11.1747 84.6437 11.1747ZM84.9383 7.5791H78.1934V17.2785H80.6528V13.6394H83.716L85.5568 17.2785H88.0162L86.0575 13.4364C87.1326 13.016 88.0162 11.7546 88.0162 10.6092C88.0014 8.94194 86.6318 7.5791 84.9383 7.5791ZM74.2172 11.1747H69.9907V9.97132H74.2172C74.556 9.95682 74.821 10.2178 74.8358 10.5512C74.8505 10.8847 74.5854 11.1602 74.2467 11.1747C74.2467 11.1747 74.232 11.1747 74.2172 11.1747ZM93.627 14.8282C92.2722 14.8282 91.1824 13.7409 91.1824 12.407C91.1824 11.0732 92.2722 9.98582 93.627 9.98582C94.9819 9.98582 96.0717 11.0732 96.0717 12.407C96.0717 13.7554 94.9819 14.8282 93.627 14.8282ZM93.6123 7.5791C90.9026 7.5936 88.723 9.75384 88.723 12.4215C88.7378 15.0892 90.932 17.2495 93.6418 17.235C96.3367 17.2205 98.531 15.0602 98.531 12.407C98.531 9.73935 96.322 7.5791 93.6123 7.5791ZM74.3351 7.5791H67.5902V17.2785H70.0496V13.6394H74.3498C76.0434 13.6394 77.4129 12.2765 77.4129 10.6092C77.3982 8.94194 76.0286 7.5791 74.3351 7.5791ZM57.2815 24.9625L53.1728 14.1033H49.064L55.2345 30.3994H59.3433L65.5138 14.1033H61.405L57.2815 24.9625ZM31.3184 30.3994H47.7534V26.3254H35.4271V24.2956H47.7534V20.2071H35.4271V18.1773H47.7534V14.1033H31.3184V30.3994Z" fill="#7C7D82"/>
							<path d="M5.96387 7.59717V14.0634H17.5538C20.3224 14.0634 22.5609 16.2816 22.5609 19.0073C22.5609 21.733 20.3224 23.9512 17.5538 23.9512L9.91062 23.9802V30.4175H17.5685C23.9599 30.3885 29.129 25.2706 29.0995 18.9638C29.0701 12.7006 23.9304 7.64066 17.5685 7.61167H5.96387V7.59717Z" fill="url(#paint0_linear)"/>
							<path d="M9.92578 17.9634V20.0511H17.5542C18.1285 20.0221 18.5704 19.5582 18.5704 18.9928C18.5704 18.4418 18.1285 17.9779 17.5542 17.9634H9.92578Z" fill="url(#paint1_linear)"/>
							<defs>
								<linearGradient id="paint0_linear" x1="25.114" y1="28.7253" x2="7.5756" y2="8.72724" gradientUnits="userSpaceOnUse">
								<stop stop-color="#F5C840"/>
								<stop offset="0.5" stop-color="#FA50A8"/>
								<stop offset="1" stop-color="#2A3ED7"/>
								</linearGradient>
								<linearGradient id="paint1_linear" x1="23.7927" y1="29.8773" x2="6.26445" y2="9.89071" gradientUnits="userSpaceOnUse">
								<stop stop-color="#F5C840"/>
								<stop offset="0.5" stop-color="#FA50A8"/>
								<stop offset="1" stop-color="#2A3ED7"/>
								</linearGradient>
							</defs>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</header>

	<!-- Fullscreens -->
	<div id="fullscreen-services" class="fullscreen">
		<div class="wrapper">

			<button class="slick-prev hs5">
				<svg width="28" height="54">
					<use class="arrow_left" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_left"></use>
				</svg>
			</button>

			<div class="toSlick" data-type="hs5" data-mobile="false">
				<?php while(have_rows('services')): the_row(); ?>
					<div class="slide">
						<div class="left">
							<div class="crop_image">
								<img src="<?= get_sub_field('img'); ?>" alt="service_img">
							</div>
						</div>
						<div class="right">
							<h4><?= get_sub_field('title'); ?></h4>
							<div class="text">
								<?= get_sub_field('descr_full'); ?>
							</div>
							<button class="open-request">
								заказать услугу
							</button>
						</div>
					</div>
					<?php endwhile; ?>
			</div>

			<button class="slick-next hs5">
				<svg width="28" height="54">
					<use class="arrow_right" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_right"></use>
				</svg>
			</button>

		</div>

		<button id="close-fullscreen-services">
			<svg>
				<use xlink:href="<?= B_IMG_DIR; ?>/icons.svg#close"></use>
			</svg>
		</button>
	</div>

	<div id="fullscreen-portfolio" class="fullscreen">
		<div class="wrapper">

			<button class="slick-prev hs6">
				<svg width="28" height="54">
					<use class="arrow_left" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_left"></use>
				</svg>
			</button>

			<div class="toSlick" data-type="hs6" data-mobile="false">

				<?php while(have_rows('portfolio')): the_row();
					$images = get_sub_field('portfolio_images');
				?>
					<div class="gallery">
						<div class="left">
							<?php foreach($images as $key => $image) { ?>
								<img class="image <?= $key === 0 ? 'active' : ''; ?>" src="<?= $image; ?>" alt="portfolio_img">
							<?php } ?>
						</div>
						<div class="right">
							<button class="slick-prev vs1">
								<svg width="13" height="27">
									<use class="arrow_left" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_left"></use>
								</svg>
							</button>
							<div class="toSlick" data-type="vs1" data-mobile="false">
								<?php foreach($images as $key => $image) { ?>
									<div class="image <?= $key === 0 ? 'active' : ''; ?>">
										<img src="<?= $image; ?>" alt="portfolio_img">
									</div>
								<?php } ?>
							</div>
							<button class="slick-next vs1">
								<svg width="13" height="27">
									<use class="arrow_right" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_right"></use>
								</svg>
							</button>
						</div>
					</div>
				<?php endwhile; ?>

			</div>

			<button class="slick-next hs6">
				<svg width="28" height="54">
					<use class="arrow_right" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_right"></use>
				</svg>
			</button>

		</div>

		<button id="close-fullscreen-portfolio">
			<svg>
				<use xlink:href="<?= B_IMG_DIR; ?>/icons.svg#close"></use>
			</svg>
		</button>
	</div>

	<!-- Overlay and modals -->
	<div id="overlay">
		<?php echo do_shortcode( '[contact-form-7 id="174" title="Записаться"] skip_mail: on' ); ?>
	</div>