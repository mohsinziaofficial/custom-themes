<?php include('inc/header-links.php'); ?>

<div class="Header">
	<div class="container">
		<div class="Logo">
			<a href="/"><img src="https://mackrellconsult.com/wp-content/uploads/2022/04/Mackrell-Consult-Logo.png" alt="Mackrell Consult Logo"></a>
		</div>
		<div class="NavWrap MenuNav">
			<div class="MobileIcon">
				<i class="fas fa-bars"></i>
			</div>
			<div class="DesktopMenu">
				<?php
				wp_nav_menu( array( 
					'theme_location' => 'main-menu', 
					'container_class' => 'custom-menu-class' ) ); 
				?>
			</div>
		</div>
	</div>
</div>
<div class="MobileNav">
	<?php
	wp_nav_menu( array( 
		'theme_location' => 'main-menu', 
		'container_class' => 'custom-menu-class' ) ); 
	?>
</div>