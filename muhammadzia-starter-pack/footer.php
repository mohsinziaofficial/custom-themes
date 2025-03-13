	<footer class="footerWrapper">
		<div class="preFooter">
			<div class="halfDiv">
				<iframe class="footerMap" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2882.767754224443!2d-1.9850663275978264!3d52.58572123575955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1swalsall%20city%20centre!5e0!3m2!1sen!2suk!4v1741824470489!5m2!1sen!2suk" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="halfDiv">
				<div class="contactDetails">
					<h3>Office Location:</h3>
					<p>Address: Lorem Ipsum is simply dummy text of the printing.</p>
					<p>Email: <a href="mailto:example@example.com">example@example.com</a></p>
					<p>Phone: 012-345-6789</p>
				</div>
			</div>
		</div>
		<div class="footerMain">
			<div class="container">
				<div class="contentMain">
					<div class="item">
						<img class="footerLogo" src="<?php echo get_template_directory_uri(); ?>/assets/theme-images/Logo.png" alt="Logo">
						<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						<div class="socialIcons">
							<a class="no-line" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
							<a class="no-line" href="#"><i class="fa-brands fa-x-twitter"></i></a>
							<a class="no-line" href="#"><i class="fa-brands fa-square-facebook"></i></a>
							<a class="no-line" href="#"><i class="fa-brands fa-instagram"></i></a>
						</div>
					</div>
					<div class="item">
						<h2>Latest <span>Posts</span>.</h2>
						<!-- Start of the main loop. -->
						<a class="no-line" href="#">
							<div class="newsItem">
								<div class="articleContent">
									<p class="blogTitle">Lorem Ipsum dummy text.</p>
									<p class="blogDate textColourPink"><strong>28 February 2025</strong></p>
								</div>
							</div>
						</a>
						<a class="no-line" href="#">
							<div class="newsItem">
								<div class="articleContent">
									<p class="blogTitle">Lorem Ipsum dummy text.</p>
									<p class="blogDate textColourPink"><strong>28 February 2025</strong></p>
								</div>
							</div>
						</a>
						<a class="no-line" href="#">
							<div class="newsItem">
								<div class="articleContent">
									<p class="blogTitle">Lorem Ipsum dummy text.</p>
									<p class="blogDate textColourPink"><strong>28 February 2025</strong></p>
								</div>
							</div>
						</a>
					</div>
					<div class="item">
						<h2>Head <span>Office</span>.</h2>
						<p>Lorem Ipsum is simply dummy text of the printing.</p>
						<p><a href="mailto:example@example.com">example@example.com</a></p>
						<p>012-345-6789</p>
					</div>
					<div class="item">
						<h2>Quick <span>Links</span>.</h2>
						<p><a href="/">Home</a></p>
						<p><a href="/about-us/">About Us</a></p>
						<p><a href="/services/">Services</a></p>
						<p><a href="/insights/">Blogs</a></p>
						<p><a href="/contact-us/">Contact Us</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="postFooterWrap">
			<div class="container">
				<p>&copy; <?php echo date("Y"); ?> Custom Theme. All rights reserved.<br />Developer: Muhammad Zia</p>
			</div>
		</div>
	</footer>
	<!-- load footer files -->
	<?php wp_footer(); ?>
	</body>
</html>