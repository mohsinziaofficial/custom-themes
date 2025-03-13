<?php get_header();

	$featureimg = get_field('custom_feature_image'); ?>

	<div class="page-header">
		<div class="container">
			<div class="page-title h-main">
				<?php
					$custom_title = get_field('custom_title');
				?>
				<h1>
					<?php
						if($custom_title){ 
								echo $custom_title;
						} else {
								the_title();
						}
					?>
				</h1>
			</div>
			<div class="feature-img">
				<?php if($featureimg) { ?>
				<img src="<?php echo $featureimg; ?>" alt="<?php the_title(); ?>"/>
				<?php } else { ?>
				<img src="/wp-content/uploads/2023/08/hero.png" alt="<?php the_title(); ?>"/>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="ContentWrap">
		<div class="container single-page-content">
			<?php the_content(); ?>
		</div>
	</div>

<?php get_footer();?>