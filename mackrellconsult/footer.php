<footer>
	<div class="container">
		<div class="footertop">
			<div class="FooterLeft">
				<div class="FooterMenu">
					<?php
					wp_nav_menu( array( 
						'theme_location' => 'footer-menu', 
						'container_class' => 'custom-menu-class' ) ); 
					?>
				</div>
				<div class="FooterSearch">
					<?php get_search_form(); ?>
				</div>
			</div>
			<div class="FooterRight">
				<div class="FooterSocial">
					<?php include('inc/social.php');?>
					<p>We use cookies on this website, you can find more information about cookies <a href="/cookie-policy/">here</a>. Website by <a target="_blank" href="https://www.je-consulting.co.uk/">JE Consulting</a>.</p>
				</div>
			</div>
		</div>
	</div>
</footer>


<?php wp_footer(); ?>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
</body>
</html>