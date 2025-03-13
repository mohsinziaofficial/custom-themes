<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W5NMDNG5');</script>
<!-- End Google Tag Manager -->
  
	<title><?php wp_title();?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
  <!-- Fav Icon -->
  <link rel="icon" href="<?php echo site_url(); ?>/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="<?php echo site_url(); ?>/favicon.ico" type="image/x-icon">
  <!-- End Fav Icon -->

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/global.css" defer="">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/general.css" defer="">
  
  <!-- animation lib -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/animate.min.css" defer="">
	
  <!-- Font Awesome 6.5.0 -->
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet" async="">
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet" async="">
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet" async="">
  
  
	
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W5NMDNG5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  
  <header>
    <div class="container">
      <?php get_search_form(); ?>
      <div class="menu-header">
           <?php if(is_page(1222)) {?>
                <div class="logo">
                    <a href="#ppc-page-top"><img src="<?php bloginfo('template_directory'); ?>/img/logo.svg" alt="<?php wp_title();?>"></a>
                </div>
                <nav>
                    <?php wp_nav_menu( array( 'theme_location' => 'ppc-menu') ); ?>
                </nav>
           <?php } elseif(is_page(1246)) { ?>
                    <div class="logo">
                        <a href="#ppc-page-top"><img src="<?php bloginfo('template_directory'); ?>/img/logo.svg" alt="<?php wp_title();?>"></a>
                    </div>
                    <nav>
                        <?php wp_nav_menu( array( 'theme_location' => 'payroll-menu') ); ?>
                    </nav>
            <?php } else { ?>
                  <div class="logo">
                    <a href="/"><img src="<?php bloginfo('template_directory'); ?>/img/logo.svg" alt="<?php wp_title();?>"></a>
                </div>
          <nav>
          <?php wp_nav_menu( array( 'theme_location' => 'main-menu') ); ?>
          </nav>
            <?php } ?>
        
      </div>
    </div>
  </header>

<div id="ContentWrap">