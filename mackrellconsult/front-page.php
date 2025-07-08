<?php get_header('home');?>
<div class="MainMenu MenuNav">
	<div class="MenuLogo">
		<img src="https://mackrellconsult.com/wp-content/uploads/2022/04/Mackrell-Consult-Logo.png" alt="Mackrell Consult Logo">
	</div>
	<div class="flyoutmenu">
		<?php
		wp_nav_menu( array( 
			'theme_location' => 'main-menu', 
			'container_class' => 'custom-menu-class' ) ); 
		?>
	</div>
	<div class="MenuSocial">
		<?php include('inc/social.php');?>
	</div>
</div>
<div class="Banner clearfix">
	<div id="Spinner" class="rotating">
		<div class="ImgWheel">
			<img src="https://mackrellconsult.com/wp-content/uploads/2022/10/New-Circle.png" alt="Mackrell Consult Wheel" usemap="#workmap">

			<map name="workmap">
				<area shape="rect" coords="545,26,582,184" alt="Computer" href="/how-can-we-help/">
			</map> 
		</div>
	</div>
	<div class="BannerText">
		<div class="Menu">
			<div id="Menu" class="MenuIcon">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<h2><?php the_field('banner_title');?></h2>
		<p><?php the_field('banner_text');?></p>
		<?php if ( get_field( 'banner_button' ) ): ?>
		<a class="Button" href="<?php the_field('banner_button');?>">Challenge Us</a>
		<?php endif; // end of if field_name logic ?>
		
	</div>
</div>
<div class="HomeContent">
	
	<div class="container">
		<div class="DownArrow">
			<a href="#Down"><i class="fas fa-chevron-down"></i></a>
		</div>
		<a name="Down"></a>
		<?php the_content();?>		
		<?php if ( get_field( 'button_link' ) ): ?>
		<a class="Button" href="<?php the_field('button_link');?>">Open The Door</a>
		<?php endif; // end of if field_name logic ?>
	</div>
</div>


<?php get_footer();?>