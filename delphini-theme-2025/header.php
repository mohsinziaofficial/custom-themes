<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title();?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/global.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/general.css">
	<!-- Font Awesome 6.5.0 -->
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/brands.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/solid.min.css" rel="stylesheet">
	<?php wp_head(); ?>

</head>
<canvas id="gradient-canvas" style="width: 100vw; height: 100vh;"></canvas>
<body <?php body_class(); ?>>
     <div class="RelatedSearchBox">
		<div class="BSR-Wrap">
			<div class="RelatedSearchClose">
				<i class="fas fa-times closeNav" aria-hidden="true"></i>
			</div>
			<div class="RelatedSearchBoxInner">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
<div class="sticky-head-nav"> 
    <div class="sticky-head-bg-colour">
	<header>
        <div class="head-banner">
    <div class="top-grid-area">
        <div class="left-area">
           <i class="fas fa-phone"></i> <a class="call" href="tel:01582250345" target="_blank">01582 250 345</a> <i class="fas fa-envelope"></i> <a class="email" href="mailto:info@delphiniaccounting.co.uk" target="_blank">info@delphiniaccounting.co.uk</a>
        </div>
        <div class="right-area">
            <a class="head-button-clear" href="/client-login/">Client login</a>
            <a class="head-white-button" href="/contact-us/">Contact</a>
        </div>
    </div>
</div>
		<div class="container">
			<div class="Logo">
				<a href="/"><img class="logo-image" src="/wp-content/uploads/2025/02/delphini-logo.png" alt="<?php wp_title();?>"></a>
			</div>
		</div>
	</header>
   
<nav>
	<div class="container">
        <div class="desktop-navigation">
		    <?php wp_nav_menu( array( 'theme_location' => 'main-menu') ); ?>
        </div>
	</div>
</nav>
    </div>    
    </div>    
<div id="ContentWrap">
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Gradient !== 'undefined') {
            var gradient = new Gradient();
            gradient.initGradient('#gradient-canvas');
        } else {
            console.error('Gradient class is not defined');
        }
    });
</script>
