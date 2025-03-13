<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		
		<!-- Google Tag Manager JEC -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WSDSSPZ7');</script>
<!-- End Google Tag Manager -->
		
		<title><?php wp_title();?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<script src="https://kit.fontawesome.com/2c05bc7799.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/global.css">

		<!------------------------------ Font Awesome ------------------------->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
		<!--------------------------------------------------------------------->

		<?php wp_head(); ?>

	</head>
	
	<body <?php body_class(); ?>>
		
		
		<!-- Google Tag Manager (noscript) JEC -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSDSSPZ7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		
		<header class="header-menu">
			
			<div class="container">
				<div class="header-main">
					<!-- Header Logo -->
					<div id="header-logo">
						<a href="https://fund-me.co.uk/">
							<img src="<?php bloginfo('template_directory'); ?>/img/FundMe_RGB_Logo.svg" width="400"/>
						</a>
					</div>
					<!-- Header Logo End -->
					
					<!-- Header Nav -->
					<div id="header-nav">
						<div class="nav-area-list">
							<?php wp_nav_menu( array('theme_location' => 'main-menu') ); ?>
						</div>
					</div>
					<!-- Header Nav End-->
				
				</div>
			</div>
		
		</header>