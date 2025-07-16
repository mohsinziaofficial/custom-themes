<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/global.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/general.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/new.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/responsive.css">
	<!-- Font Awesome 6.5.0 -->
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<div class="FlyoutMenuOverlay"></div>
	<div class="FlyoutMenu">
		<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
	</div>
	<header>
		<div class="container">
			<div class="logo">
				<a href="/"><img src="https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/05/Grunberg-RGB-Logo.svg" alt="<?php wp_title(); ?>"></a>
			</div>
			<div class="header-interactables">
				<div class="socials">
					<div class="search social-icon">
						<i class="swapIcon fa-solid fa-magnifying-glass"></i>
					</div>
					<div class="searchBox">
						<?php get_search_form(); ?>
					</div>
					<a class="social-icon" href="https://www.linkedin.com/company/3134075" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
					<a class="social-icon" href="https://www.facebook.com/grunbergco/" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
					<a class="social-icon" href="/newsroom"><i class="fa-solid fa-rss"></i></a>
					<a class="social-icon" href="https://twitter.com/GrunbergandCo" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-x-twitter"></i></a>
					<a class="social-icon" href="https://www.youtube.com/channel/UChQyhC7gOTFThugqfHdd0iw" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-play"></i></a>
				</div>
				<nav style="cursor: pointer;">
					<i class="fa-solid fa-bars"></i>
				</nav>
			</div>
		</div>
	</header>

	<?php if (is_front_page()) : ?>
		<div class="homepage-header-container panel no-container">
			<div class="homepage-header">
				<div class="left-container">
					<p class="tagline"><span class="animated-crown bold">Great <span class="crown-wrapper">
								<img src="/wp-content/uploads/2025/06/Crown-Middle.png" class="crown crown-middle" />
								<img src="/wp-content/uploads/2025/06/Crown-End.png" class="crown crown-end" />
							</span></span> people,<br /><span class="bold">Great</span> <span class="green-underline-home">results</span></p>
					<h1 class="home">Chartered Accountants,<br />
						Tax & Business Advisers</h1>
					<p class="header-intro">Behind every great business are great business leaders, who we help to support with expert advice that allows them to achieve their ambitions.</p>
					<p class="header-intro-alt">Behind every great business are great business leaders, who we are here to help.</p>
					<a class="button header-button" src="tel:02084580083">Call us today</a>
				</div>
				<div class="middle-container"></div>
				<div class="right-container">
					<img src="/wp-content/uploads/2025/05/main-banner-cropped.png" alt="" class="main-logo">
					<div class="image-carousel">
						<div class="header-image-carousel"></div>
					</div>
				</div>
				<div class="mobile-header">
					<video width="100%" height="auto" muted="" autoplay="" loop="">
						<source src="/wp-content/uploads/2025/06/V2-Website-Video.mp4" type="video/mp4">
						Your browser does not support the video tag.
					</video>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div id="ContentWrap">