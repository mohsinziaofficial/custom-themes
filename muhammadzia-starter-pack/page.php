<?php
	get_header();
	$featureImage = get_the_post_thumbnail_url();
	if(!$featureImage) {
		$featureImage = get_template_directory_uri() . "/assets/theme-images/service-1.jpg";
	}
	$custom_title = function_exists('get_field') ? get_field('custom_title') : '';
?>

<div class="pageTop" style="background-image: url('<?php echo $featureImage; ?>');">
	<div class="container">
		<div class="overlayText">
			<?php if (function_exists('yoast_breadcrumb')) : ?>
				<div class="breadcrumbs-wrap">
				    <?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
				</div>
			<?php endif; ?>
			<h1 class="title">
				<?php
					if($custom_title){ 
						echo $custom_title;
					} else {
						the_title();
					}
				?>
			</h1>
		</div>
	</div>
</div>

<div class="pageWrap mainWrap">
    <div class="container">
        <div class="contentWrapper">
            <div class="content">
            	<?php the_content(); ?>
            </div>
            <div class="pageSidebar">
				<!-- side news articles -->
				<div class="latesNewsArticles">
					<h3>Latest <span class="focusedText">News</span>.</h3>
					<div class="newsArticlesLoop">
						<!-- Start of the main loop. -->
						<a class="no-line" href="#">
							<div class="newsItem" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/theme-images/service-1.jpg')">
								<div class="textOverlay">
									<p class="blogDate">28 February 2025</p>
									<h4 class="blogTitle">Architecto dolores aut at.</h4>
								</div>
							</div>
						</a>
						<a class="no-line" href="#">
							<div class="newsItem" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/theme-images/service-2.jpg')">
								<div class="textOverlay">
									<p class="blogDate">28 February 2025</p>
									<h4 class="blogTitle">Iste eos rem quia molestias a incidunt.</h4>
								</div>
							</div>
						</a>
						<a class="no-line" href="#">
							<div class="newsItem" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/theme-images/service-3.jpg')">
								<div class="textOverlay">
									<p class="blogDate">28 February 2025</p>
									<h4 class="blogTitle">Asperiores omnis fugiat consequatur.</h4>
								</div>
							</div>
						</a>
						<!-- End of the main loop -->
					</div>
				</div>
				<!-- side news articles -->
          </div>
      </div>
  </div>
</div>

<?php get_footer();?>