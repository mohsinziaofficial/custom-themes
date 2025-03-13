<?php
	get_header();
	$featureImage = get_the_post_thumbnail_url();
	if(!$featureImage) {
		$featureImage = get_template_directory_uri() . "/assets/theme-images/hero-bg.jpg";
	}
?>

<section class="contentWrap">
	<!-- if you are not using any page builder -->
	<section class="heroSection">
		<div class="featuredImage">
			<div class="whiteTilt"></div>
			<div class="pinkTilt"></div>
			<div class="imageTilt">
				<img src="<?php echo $featureImage; ?>" alt="WordPress Custom Theme" style="left: -119.685px; bottom: -111.472px; transition: none;">
			</div>
		</div>
		<div class="container">
			<div class="textOverlay">
				<h1 class="title textColourWhite">Lorem <span>Ipsum</span></h1>
				<div class="tagLineDiv">
					<p><strong>Lorem Ipsum is simply dummy text.</strong><br>
					It is a long established fact that a reader will<br>
					be distracted by the content.</p>
				</div>
			</div>
		</div>
	</section>
	<section class="servicesSection">
		<div class="serviceItem" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/theme-images/service-1.jpg');">
			<div class="serviceItemDetails">
				<h1 class="title">Lorem <span>Ipsum</span></span></h1>
				<p class="link"><a class="no-line" href="/about/">Read More &gt;&gt;</a></p>
			</div>
		</div>
		<div class="serviceItem" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/theme-images/service-2.jpg');">
			<div class="serviceItemDetails">
				<h1 class="title">Lorem <span>Ipsum</span></h1>
				<p class="link"><a class="no-line" href="/insights/">Read More &gt;&gt;</a></p>
			</div>
		</div>
		<div class="serviceItem" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/theme-images/service-3.jpg');">
			<div class="serviceItemDetails">
				<h1 class="title">Lorem <span>Ipsum</span></h1>
				<p class="link"><a class="no-line" href="/resources/">Read More &gt;&gt;</a></p>
			</div>
		</div>
	</section>
	<section class="aboutSection">
		<div class="container">
			<div class="row">
				<div class="rowCol70">
					<h2>Lorem Ipsum</h2>
					<p>Lorem Ipsum is simply <span class="textColourPink">dummy text</span> of the printing and typesetting industry.</p>
					<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div>
				<div class="rowCol30">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/theme-images/arrow-400x400.png">
				</div>
			</div>
		</div>
	</section>
	<section class="testimonialsSection">
		<div class="container"></div>
	</section>
	<!------------------------------------------->

	<!-- if you are using any page builder -->
	<section class="contentSection">
		<div class="container">
			<?php the_content(); ?>
		</div>
	</section>
	<!---------------------------------------->
</section>

<?php get_footer(); ?>