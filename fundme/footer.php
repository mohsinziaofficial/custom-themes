<?php wp_footer(); ?>
<div class="get-in-touch-wrap">
	<div class="container">
		<div class="get-in-touch">
			<div class="get-in-touch-text">
				<p>Get in touch with us</p>
			</div>
			<div class="get-in-touch-btn green-btn">
			<a href="/contact-us/">Contact Us</a></div>
		</div>
	</div>
</div>

<div class="social-media-wrap">
	<div class="container">
		<h3>Follow us on social media</h3>
		<div class="social-media-icons">
			<a href="https://twitter.com/FundMe_Finance" target="_blank">
				<img src="/wp-content/uploads/2023/08/twitter-x.png" alt="twitter x icon"/>
			</a>
			<a href="https://www.linkedin.com/company/fundmefinance" target="_blank">
				<img src="/wp-content/uploads/2023/08/linkedin.png" alt="linkedin icon"/>
			</a>
			<a href="https://www.facebook.com/profile.php?id=100095654821904" target="_blank">
				<img src="/wp-content/uploads/2023/08/facebook.png" alt="facebook icon"/>
			</a>
			<a href="https://www.instagram.com/fundmefinance/" target="_blank">
				<img src="/wp-content/uploads/2023/08/instagram.png" alt="instagram icon"/>
			</a>
		</div>
	</div>
</div>

<!-- footer starts -->
<footer class="white-text">
	<div class="container">
		<div class="top-footer">
			<div class="top-footer-left">
				<!-- Footer Logo -->
				<div class="footer-logo">
					<a href="https://fund-me.co.uk/">
						<img src="<?php bloginfo('template_directory'); ?>/img/FundMe_RGB_Logo-White.png" width="400"/>
					</a>
				</div>
				<div class="p-footer">
					<p>FundMe is a trading style of Ascendis Intermediaries Ltd. Registered in England and Wales (Company Number 08849585).</p>
					<br>
					<p><strong>Registered Office Address :</strong>
						<br>Unit 3, Building 2, The Colony Wilmslow Altrincham Road, Wilmslow, Cheshire, SK9 4LY</p>
				</div>
				<!-- Footer Logo End -->
			</div>
			
			<div class="top-footer-right">
				<!-- Footer Menu -->
				<div>
					<h3>Get in touch</h3>
					<p class="p-footer"><a href="mailto:enquiries@fund-me.co.uk">enquiries@fund-me.co.uk</a></p>
					<p class="p-footer"><a href="tel:08450548560">0845 054 8560</a></p>
				</div>
				<div>
					<h3>Pages</h3>
					<p class="p-footer"><a href="/funding-solutions/">Funding Solutions</a></p>
					<p class="p-footer"><a href="/why-use-us/">Why Use Us</a></p>
					<p class="p-footer"><a href="/faqs/">FAQs</a></p>
					<p class="p-footer"><a href="/latest-news/">News</a></p>
					<p class="p-footer"><a href="/contact-us/">Contact Us</a></p>
				</div>
				<div>
					<h3>Subscribe</h3>
					<p class="p-footer" style="margin-bottom: 5px;">to our News, Product Updates and Guides</p>
					<p class="p-footer"><?php echo do_shortcode('[gravityform id="5" title="false" ajax=“true”]'); ?></p>
				</div>
				<div class="footer-logo">          
					<a href="https://nacfb.org/" target="_blank">
						<img src="<?php bloginfo('template_directory'); ?>/img/NACFB_Logo_White.png" width="300"/>
					</a>
				</div>
				<!-- Footer Menu End -->
			</div>
		</div>
		<div class="bottom-footer">
			<!-- Footer Policy Links -->
			<div class="bottom-footer-left">
				<p class="p-footer">© 2023 FundMe. All Rights Reserved.</p>
			</div>
			<div class="bottom-footer-right">
				<p class="p-footer white-text privacy-links">
					<a href="/privacy-policy/">PRIVACY POLICY</a>
					<a href="#">TREATING CUSTOMERS FAIRLY</a>
				</p>
        <p class="p-footer white-text privacy-links">
					<a href="https://www.je-consulting.co.uk/" target="_blank">Website for Accountants by: JE Consulting</a>
        </p>
			</div>
			<!-- Footer Policy Links End -->
		</div>
	</div>
</footer>
<!-- footer ends -->

<script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
</body>
</html>