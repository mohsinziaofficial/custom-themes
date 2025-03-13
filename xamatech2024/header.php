<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  
	<!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-8T3LX381WQ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-8T3LX381WQ');
  </script>
	<!-- Google tag (gtag.js) -->
	
	<title><?php wp_title(); ?></title>
  <link rel="icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/global.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/general.css">
	<!-- Font Awesome 6.5.0 -->
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet">
  
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MKKL5BHM');</script>
	<!-- End Google Tag Manager -->
  
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKKL5BHM" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <div class="pre-header">
    <div class="container">
      <div class="left">
        <a class="header-social-icon" href="mailto:info@xamatech.com"><img src="/wp-content/themes/xamatech2024/img/email-icon.png"/></a>
        <a class="header-social-icon" href="https://www.linkedin.com/company/xama-technologies-limited/" target="_blank"><img src="/wp-content/themes/xamatech2024/img/linkedin-icon.png"/></a>
      </div>
      <div class="right">
        <a href="https://platform.xamatech.com/auth/signup" target="_blank" class="button-pink">Free Trial</a>
        <a href="https://platform.xamatech.com/auth/login" target="_blank" class="button-pink">Login</a>
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
	<header>
		<div class="container">
			<div class="logo">
				<a href="/">
          <img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="<?php wp_title();?>">
        </a>
			</div>
      <div class="nav-bar">
        <nav>
          <?php wp_nav_menu( array( 'theme_location' => 'main-menu') ); ?>
        </nav>
      </div>
		</div>
	</header>
<div id="ContentWrap">