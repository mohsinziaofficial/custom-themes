</div><!-- End of ContentWrap -->

<footer>
	<div class="container">
		<div class="info-section">
			<div class="info-left">
				<h3 class="white wipe orange-wipe">Get in touch</h3>
				<h6>Grunberg</h6>
				<p class="white">
					5 Technology Park<br />
					Colindeep Lane<br />
					London<br />
					NW9 6BX<br />
				</p>
				<a class="email" href="mailto:contact@grunberg.co.uk">contact@grunberg.co.uk</a><br />
				<a class="phone" href="tel:02084580083">(0) 20 8458 0083</a>
				<div class="newsletterContainer">
					<h3 class="white">Sign up for our newsletter</h3>
					<?php echo do_shortcode('[gravityform id="2" title="false"]'); ?>
				</div>
			</div>
			<div class="info-right">
				<h3 class="white">Find out how we can help you</h3>
				<?php echo do_shortcode('[gravityform id="1" title="false"]'); ?>
			</div>
		</div>
	</div>
	<div class="logo-section">
		<div class="award-logos-slider">
			<?php
			$args = [
				'post_type' => 'images',
				'posts_per_page' => -1,
				'post_status' => 'publish'
			];

			$logos = new WP_Query($args);

			if ($logos->have_posts()) :
				while ($logos->have_posts()) : $logos->the_post();
					$logo_url = get_field('award_logo');
					if ($logo_url) :
			?>
						<div class="logo-slide">
							<img src="<?php echo esc_url($logo_url); ?>" alt="<?php the_title_attribute(); ?>">
						</div>
			<?php
					endif;
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
	<div class="container">
		<div class="split-footer-top">
			<div>
				<a class="email" href="mailto:contact@grunberg.co.uk">contact@grunberg.co.uk</a><br />
				<a class="phone" href="tel:02084580083">(0) 20 8458 0083</a>
			</div>
			<div class="grunberg-family">
				<p class="white small-paragraph">Also part of<br />our family:</p>
				<img src="https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/06/Grunberg-Reverse-Logo-1.png" alt="Grunberg Probate Services">
				<img src="https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/06/Reanda-1.png" alt="Reanda Logo">
			</div>
		</div>
		<hr />
		<div class="split-footer-bottom">
			<p class="white">Grunberg, 5 Technology Park,<br />Colindeep Lane, London, NW9 6BX</p>
			<div class="logos-container">
				<img src="https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/06/Apps_Xero-1.png" alt="Xero Logo">
				<img src="https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/06/ICAEW.png" alt="ICAEW Logo">
				<img src="https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/06/CTA-1.png" alt="CTA Logo">
			</div>
		</div>
	</div>
	<div class="footer-links">
		<div class="container white">
			<a href="/terms-conditions">Terms and Conditions</a> |
			<a href="/privacy-policy">Privacy Notice</a> |
			<a href="/quality-policy">Quality Policy</a> |
			<a href="/regulatory-information">Regulatory Information</a> |
			<a href="/copyright">Copyright</a> |
			<a href="/accessibility-statement">Accessibility Statement</a> |
			<a href="#">Cookies</a> |
			<a href="/sitemap">Sitemap</a>
		</div>
	</div>
	<div class="copyright-info">
		<div class="container">
			&copy; <?php echo date('Y'); ?> Grunberg Limited. Website designed by: <a href="https://www.je-consulting.co.uk/" target="_blank">JE Consulting</a>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/headerCarousel.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/expertSectorsCarousel.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/gsap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/ScrollTrigger.min.js"></script>
</body>

</html>