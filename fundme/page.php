<?php get_header();

	$thumb = get_the_post_thumbnail_url(); ?>

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
				<?php if(has_post_thumbnail()) { ?>
				<img src="<?php echo $thumb; ?>" alt="<?php the_title(); ?>"/>
				<?php } else { ?>
				<img src="/wp-content/uploads/2023/08/hero.png" alt="<?php the_title(); ?>"/>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="ContentWrap">
		<div class="container">
			<?php the_content(); ?>
		</div>
	</div>

<?php get_footer();?>