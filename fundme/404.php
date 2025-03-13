<?php get_header();

	$thumb = get_the_post_thumbnail_url(); ?>

	<div class="page-header">
		<div class="container">
			<div class="page-title h-main">
				<?php
					$custom_title = get_field('custom_title');
				?>
				<h1>Page not found</h1>
				<div class="errormessage">
					<p>Sorry the page you're looking for doesn't exist. If you think something is broken, please contact us.</p>
					<a href="/" class="Button">Return Home</a> <a href="/contact-us/" class="Button">Report Problem</a>
				</div>
			</div>
			<div class="feature-img">
				<?php if(has_post_thumbnail()) { ?>
				<img src="<?php echo $thumb; ?>" alt="<?php the_title(); ?>"/>
				<?php } else { ?>
				<img src="/wp-content/uploads/2023/08/hero.png" alt="<?php the_title(); ?>"/>
				<?php } ?>
			</div>
		</div>
	</div>


<?php get_footer();?>