<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title();?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
  
  <!-- Style files -->
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/slick.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/global.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/general.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/custom-animations.css">
	<!-- Font Awesome 6.5.0 -->
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<header>
    <div class="bg-overlay"></div>
		<div class="container">
      <div class="header-menu">
        <div class="logo">
          <a href="/"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="<?php wp_title();?>"></a>
        </div>
        
        <div class="menu-div">
          <nav>
            <div class="container">
              <?php wp_nav_menu( array( 'theme_location' => 'main-menu') ); ?>
            </div>
          </nav>
          
          <div>
            <p class="contact-badge">01332 477 070 <a class="email-button" href="mailto:accountants@randduk.com">Email</a></p>
          </div>
          
          <div class="search-icon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>          
        </div>
        
      </div>
		</div>
	</header>
  <div class="search-form-popup">
    <div class="popup-overlay"></div>
    <div class="search-form-div">
      <p class="popup-close-btn"><span>X</span></p>
      <?php get_search_form(); ?>
    </div>
  </div>
<div class="ContentWrap">