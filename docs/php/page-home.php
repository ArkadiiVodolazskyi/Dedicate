
	<?php
		/*
			Template Name: Главная (Home Page)
		*/
	?>

	<?php get_header(); ?>

	<!-- Content start -->
	<section class="banner_main">
		<?php while(have_rows('slides')): the_row(); ?>
			<img class="banner_img <?= get_row_index() === 1 ? 'active' : ''; ?>" src="<?= get_sub_field('banner_img'); ?>" alt="Banner_main">
		<?php endwhile; ?>

		<div class="blurred_wrapper">
			<div class="toSlick" data-type="hs1" data-mobile="false">
				<?php while(have_rows('slides')): the_row(); ?>
					<div class="slide">
						<h1 class="loading">
							<?= get_sub_field('h1'); ?>
						</h1>
						<h2 class="loading">
							<?= get_sub_field('h2'); ?>
						</h2>
						<nav>
							<ul>
								<?php while(have_rows('links_list')): the_row(); ?>
									<li
										class="nav_subItem loading"
										style="animation-delay: <?= get_row_index()*0.1; ?>s"
									>
										<a href="<?= get_sub_field('link')['url']; ?>" class="nav_subLink">
										<?= get_sub_field('link')['title']; ?>
									</a></li>
								<?php endwhile; ?>
							</ul>
						</nav>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="slick_nav hs1">
				<button class="slick-prev" style="opacity: 0;">
					<svg width="13" height="24">
						<use class="arrow_left" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_left"></use>
					</svg>
				</button>
				<button class="slick-next" style="opacity: 0;">
					<svg width="13" height="24">
						<use class="arrow_right" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_right"></use>
					</svg>
				</button>
			</div>
		</div>
	</section>

	<section id="services" class="service">
		<div class="wrapper">
			<h3>
				<img src="<?= B_IMG_DIR; ?>/header_line_left.png" data-aos="slide-right">
				Услуги
				<img src="<?= B_IMG_DIR; ?>/header_line_right.png" data-aos="slide-left">
			</h3>
			<div class="cards toSlick" data-type="hs7" data-mobile="true" data-screen="1280">
				<?php while(have_rows('services')): the_row(); ?>
					<div class="card">
						<div class="service_img">
							<img src="<?= get_sub_field('img'); ?>" alt="service_img">
						</div>
						<h4 data-aos="fade-left" data-aos-delay="<?= get_row_index() * 100; ?>">
							<?= get_sub_field('title'); ?>
						</h4>
						<div class="text">
							<?= get_sub_field('descr_short'); ?>
							<button class="open-fullscreen-services more" data-slide="<?= get_row_index() - 1; ?>">
								подробнее
							</button>
						</div>
						<div class="shadow"></div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="slick_nav hs7">
				<button class="slick-prev hs7">
					<svg width="41" height="41">
						<use class="arrow_left" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_left_2"></use>
					</svg>
				</button>
				<button class="slick-next hs7">
					<svg width="41" height="41">
						<use class="arrow_right" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_right_2"></use>
					</svg>
				</button>
			</div>
		</div>
	</section>

	<section id="about_us" class="about_us">
		<div class="wrapper">

			<div class="left">
				<h3>
					<img src="<?= B_IMG_DIR; ?>/header_line_left.png" data-aos="slide-right">
					О нас
					<img src="<?= B_IMG_DIR; ?>/header_line_right.png" data-aos="slide-left">
				</h3>
				<div class="text">
					<?= get_field('about_text'); ?>
				</div>
				<div class="slogan" data-aos="slide-up">
					<a href="#">
						<svg>
							<use class="logo_delicate" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#logo_delicate"></use>
						</svg>
					</a>
					<div class="dash"></div>
					<h4 class="slogan_text">
						Больше чем<br>
						детейлинг
					</h4>
				</div>
			</div>

			<div class="right">
				<div class="photos">
					<?php $about_gallery = get_field('about_gallery');
						foreach($about_gallery as $index => $img) {
					?>
						<img src="<?= $img; ?>" alt="aboutus" data-aos="fade-up" data-aos-delay="<?= 300 - 100*$index; ?>" data-aos-anchor="#about_us">
					<?php } ?>
				</div>
			</div>

		</div>
	</section>

	<section id="pros" class="pros">
		<div class="wrapper">
			<?php while(have_rows('pros')): the_row();
			?>
				<div class="card">
					<svg class="svg_text"
					data-aos="draw_text"
					data-aos-delay="<?= get_row_index() * 500; ?>"
					data-aos-anchor="#pros"
					data-aos-duration="1000"
					xmlns="http://www.w3.org/2000/svg" viewBox="0 -80 60 90">
						<text class="letter">
							<?= get_row_index(); ?>
						</text>
					</svg>
					<p
						data-aos="fade-up"
						data-aos-duration="500"
						data-aos-easing="ease-in-out-back"
						data-aos-anchor="#pros"
						data-aos-delay="<?= get_row_index() * 100; ?>"
					>
						<?= get_sub_field('text'); ?>
					</p>
				</div>
			<?php endwhile; ?>
		</div>
	</section>

	<section id="portfolio" class="portfolio">
		<h3>
			<img src="<?= B_IMG_DIR; ?>/header_line_left.png" data-aos="slide-right">
			Наши работы
			<img src="<?= B_IMG_DIR; ?>/header_line_right.png" data-aos="slide-left">
		</h3>

		<div class="toSlick" data-type="hs2" data-mobile="false">

		<?php while(have_rows('portfolio')): the_row();
			$index = get_row_index();
		?>
			<div class="slide">
				<img class="portfolio_img" src="<?= get_sub_field('portfolio_images')[0]; ?>" alt="portfolio_img">
				<div class="text">
					<h5 class="service"
						<?= $index === 2 ? "data-aos='fade-in'" : ''; ?>
					>
						<?= get_sub_field('portfolio_service'); ?>
					</h5>
					<div class="manage">
						<span class="car_name"
							<?= $index === 2 ? "data-aos='fade-up' data-aos-delay='100'" : ''; ?>
						>
							<?= get_sub_field('portfolio_auto'); ?>
						</span>
						<button class="open-fullscreen-portfolio more" data-slide="<?= get_row_index() - 1; ?>"
							<?= $index === 2 ? "data-aos='fade-up' data-aos-delay='200'" : ''; ?>
						>
							подробнее
						</button>
					</div>
				</div>
				<button class="open-fullscreen-portfolio maximize" data-slide="<?= get_row_index() - 1; ?>">
					<svg width="32" height="32">
						<use class="maximize" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#maximize"></use>
					</svg>
				</button>
			</div>
		<?php endwhile; ?>

		</div>

		<div class="slick_nav hs2 desktop">
			<button class="slick-prev">
				<svg width="13" height="24">
					<use class="arrow_left" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_left"></use>
				</svg>
			</button>
			<button class="slick-next">
				<svg width="13" height="24">
					<use class="arrow_right" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_right"></use>
				</svg>
			</button>
		</div>
		<div class="slick_nav hs2 mobile">
			<button class="slick-prev">
				<svg width="41" height="41">
					<use class="arrow_left" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_left_2"></use>
				</svg>
			</button>
			<button class="slick-next">
				<svg width="41" height="41">
					<use class="arrow_right" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_right_2"></use>
				</svg>
			</button>
		</div>

	</section>

	<section id="prices" class="prices">
		<div class="wrapper">
			<h3>
				<img src="<?= B_IMG_DIR; ?>/header_line_left.png" data-aos="slide-right">
				Стоимость услуг
				<img src="<?= B_IMG_DIR; ?>/header_line_right.png" data-aos="slide-left">
			</h3>
			<div class="slick_nav hs3" data-aos="fade-up" data-aos-offset="50">
				<div class="slick_dots"></div>
			</div>
			<div id="prices_content" class="content toSlick" data-type="hs3" data-mobile="false">
				<?php while(have_rows('prices')): the_row();
					$is_complex = get_sub_field('prices_type') === 'complex' ? true : false;
				?>
					<div class="slide" data-title="<?= get_sub_field('prices_name'); ?>">
						<div>
							<table class="<?= $is_complex ? 'complex' : ''; ?>">
								<thead>
									<th><?= get_sub_field('ths')['th1']; ?></th>
									<th><?= get_sub_field('ths')['th2']; ?></th>
									<th><?= get_sub_field('ths')['th3']; ?></th>
									<th><?= get_sub_field('ths')['th4']; ?></th>
								</thead>
								<tbody>
									<?php while(have_rows('row')): the_row(); ?>
										<tr data-aos="fade-in" data-aos-delay="<?= get_row_index()*50; ?>" data-aos-anchor="#prices_content">
											<td>
												<?php if ($is_complex) { ?>
													<?= get_sub_field('td1_complex'); ?>
												<?php } else { ?>
													<?= get_sub_field('td1'); ?>
												<?php } ?>
											</td>
											<td <?= get_sub_field('is_general') ? "colspan='3'" : ""; ?>>
												<?= get_sub_field('td2'); ?>
											</td>
											<?php if (!get_sub_field('is_general')) { ?>
												<td><?= get_sub_field('td3'); ?></td>
												<td><?= get_sub_field('td4'); ?></td>
											<?php } ?>
										</tr>
									<?php endwhile; ?>
								</tbody>
							</table>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>

	<section id="reviews" class="reviews">
			<h3>
				<img src="<?= B_IMG_DIR; ?>/header_line_left.png" data-aos="slide-right">
				Отзывы
				<img src="<?= B_IMG_DIR; ?>/header_line_right.png" data-aos="slide-left">
			</h3>

		<div class="wrapper">

			<button class="slick-prev hs4 desktop">
				<svg width="28" height="54">
					<use class="arrow_left" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_left"></use>
				</svg>
			</button>

			<div class="toSlick" data-type="hs4" data-mobile="false">
				<?php
					$reviews = get_field('reviews');
					foreach($reviews as $index => $review) {
				?>
					<div class="slide"
						<?= $index === 0 ? "data-aos='fade-up' data-aos-delay='200'" : ""; ?>
						<?= $index === 1 ? "data-aos='fade-in' data-aos-delay='400'" : ""; ?>
						<?= $index === 2 ? "data-aos='fade-up' data-aos-delay='300'" : ""; ?>
					>
						<img class="review_img" src="<?= $review; ?>" alt="review_img">
					</div>
				<?php } ?>
			</div>

			<button class="slick-next hs4 desktop">
				<svg width="28" height="54">
					<use class="arrow_right" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_right"></use>
				</svg>
			</button>

			<div class="slick_nav hs4 mobile">
				<button class="slick-prev hs4">
					<svg width="41" height="41">
						<use class="arrow_left" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_left_2"></use>
					</svg>
				</button>
				<button class="slick-next hs4">
					<svg width="41" height="41">
						<use class="arrow_right" xlink:href="<?= B_IMG_DIR; ?>/icons.svg#arrow_right_2"></use>
					</svg>
				</button>
			</div>

		</div>

	</section>

	<section id="contacts" class="contacts">
		<div class="bg_wrap">
			<img class="contacts_bg" src="<?= get_field('contacts_bg'); ?>" alt="contacts_bg">
		</div>
		<div class="wrapper">

			<h3>
				<img src="<?= B_IMG_DIR; ?>/header_line_left.png" data-aos="slide-right">
				Контакты
				<img src="<?= B_IMG_DIR; ?>/header_line_right.png" data-aos="slide-left">
			</h3>
			<p class="connect_us" data-aos="fade-in">Свяжитесь с нами прямо сейчас</p>

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
					<a
						href="<?= $link; ?>"
						data-aos="fade-up"
						data-aos-delay="<?= get_row_index() * 100; ?>"
					>
						<svg class="<?= $type === 'facebook' ? 'stroke' : ''; ?>" width="28" height="28"><use xlink:href="<?= B_IMG_DIR; ?>/icons.svg#<?= $type; ?>"></use></svg>
					</a>
				<?php endwhile; ?>
			</div>

			<div class="phones">
				<?php while ( have_rows('phones', 'options')): the_row();
					$phone = str_replace(str_split(' ()+-'), '', get_sub_field('phone'));
				?>
					<a
						href="tel:<?= $phone; ?>"
						data-aos="fade-up"
						data-aos-delay="<?= get_row_index() * 80; ?>"
					>
						<svg width="35" height="35">
							<use xlink:href="<?= B_IMG_DIR; ?>/icons.svg#phone"></use>
						</svg>
						<?= get_sub_field('phone'); ?>
					</a>
				<?php endwhile; ?>
			</div>

			<div class="address-schedule">
				<div class="address" data-aos="fade-up">
					<svg width="24" height="24">
						<use xlink:href="<?= B_IMG_DIR; ?>/icons.svg#map"></use>
					</svg>
					<div>
						<p>
							<?= get_field('address', 'options'); ?>
						</p>
					</div>
				</div>
				<div class="schedule" data-aos="fade-up" data-aos-delay="200">
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
			</div>

			<?php echo do_shortcode( '[contact-form-7 id="175" title="Связаться с нами"]' ); ?>

			<div class="map_wrapper">
				<!-- <div id="map" data-aos="slide-right"></div> -->
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2751.244108937063!2d30.72926025094772!3d46.40421537814611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c633603bf516cf%3A0x2cce6c0acbdab12f!2z0JvRjtGB0YLQtNC-0YDRhNGB0LrQsNGPINC00L7RgC4sIDE0OSwg0J7QtNC10YHRgdCwLCDQntC00LXRgdGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCA2NTAwMA!5e0!3m2!1sru!2sua!4v1629120512759!5m2!1sru!2sua" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
		</div>
	</section>
	<!-- Content end -->

	<?php get_footer(); ?>
