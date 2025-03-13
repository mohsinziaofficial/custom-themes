<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Google Tag Manager JEC -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WKX5MDG');</script>
<!-- End Google Tag Manager -->
	<title><?php wp_title();?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/global.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/slick.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/keyframes.css">
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) JEC -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJWTNT2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div class="FlyoutMenu">
		<div class="MenuCross">
			<i class="fa-solid fa-xmark"></i>
		</div>
		<div class="SocialWrap">
			<?php include('inc/social.php'); ?>
		</div>
		<div class="MainFlyOut">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu') ); ?>
		</div>
		<div class="SubFlyOut">
			<?php wp_nav_menu( array( 'theme_location' => 'top-menu') ); ?>
		</div>
	</div>
	<div class="TopBar">
		<div class="container">
			<div class="SocialWrap">
				<div class="SocialInner">
					<?php include('inc/social.php'); ?>
				</div>
			</div>
			<div class="RegionSelector">
				<p>Choose your region:</p>
				<ul>
					<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-has-children">
						<div class="CountryLink" aria-current="page">UK <img src="<?php bloginfo('template_directory'); ?>/img/flags/UK.png" alt="UK Flag"> <i class="fa-solid fa-chevron-down"></i></div>
						<ul class="sub-menu" style="display: none;">
							<li><a href="/au">Australia  <img src="<?php bloginfo('template_directory'); ?>/img/flags/Australia.png" alt="Australia Flag"></a></li>
							<li><a href="/eu">EU  <img src="<?php bloginfo('template_directory'); ?>/img/flags/EU.png" alt="EU Flag"></a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="TopMenu">
				<div class="TopMenuWrap">
					<?php wp_nav_menu( array( 'theme_location' => 'top-menu') ); ?>
				</div>

				<div class="TopSearch">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>
	<header>
		<div class="container">
			<a href="/uk/">
				<img class="Logo" src="<?php bloginfo('template_directory'); ?>/img/MyWorkpapers.svg" alt="MyWorkpapers">
			</a>
			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu') ); ?>
				<div class="MobileMenu">
					<img src="<?php bloginfo('template_directory'); ?>/img/menu-bars.svg" alt="Menu Button">
				</div>
			</nav>
		</div>
	</header>
	<?php if(is_front_page()){?>
	
	<div class="BrightBanner">
		<div class="BrightLeft">
			<img src="/uk/wp-content/uploads/2024/08/Weve-join-bright-left.jpg" alt="We've joined Bright">
		</div>
		<div class="BrightRight">
			<a href="https://myworkpapers.com/uk/bright/">
				<img src="/uk/wp-content/uploads/2024/08/Weve-joined-bright-right.jpg" alt="We've joined Bright - Find out more button">
			</a>
		</div>
	</div>
	<?php } ?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	