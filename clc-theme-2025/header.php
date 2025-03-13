<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  
  <head>
    
    <title><?php wp_title();?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/global.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/slick.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/general.css">
    <!-- animation file -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/animate.min.css"
    />
    <!-- Font Awesome 6.5.0 -->
    <link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet">
    
    <!-- Google Tag Manager JEC -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WSDRCZP');</script>
    <!-- End Google Tag Manager -->
    
    <?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?>>

    <!-- Google Tag Manager JEC (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSDRCZP"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="TopBar">
      <div class="container">
        <div class="contactinfo">020 7406 1000 &bull;&nbsp; <a href="mailto:info@cartercamerons.com">info@cartercamerons.com</a></div>
        <div class="TopLinks"><a href="https://www.cartercamerons.pl/" target="_blank">Polish</a> <a href="https://www.cartercamerons.co.za/" target="_blank">South Africa</a> <a href="https://www.linkedin.com/company/carter-lemon-camerons-llp/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></div>
      </div>
    </div>
    <header>
      <div class="container">
        <a href="/">
          <img class="Logo" src="<?php bloginfo('template_directory'); ?>/img/CLC-Logo.svg" alt="Carter Lemon Camerons">
        </a>
        <nav>
          <div class="TopSearch"><?php get_search_form(); ?></div>
          <?php wp_nav_menu( array( 'theme_location' => 'main-menu') ); ?>
        </nav>
      </div>
    </header>
  <div id="ContentWrap">