<?php get_header();?>
<div class="PageWrap MainWrap">
    <div class="container">
        <div class="breadcrumbs-wrap">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                } ?>
        </div>
        <?php
            if( have_rows('inner_page_hero') ): //condition 1 start
              while ( have_rows('inner_page_hero') ) : the_row(); //while loop start
                $page_title = get_sub_field('page_title');
                $description = get_sub_field('description');
                $banner_image = get_sub_field('banner_image');
                $banner_image_target = get_sub_field('image_target_link');
                $banner_image_text = get_sub_field('banner_image_text');
                $banner_button_link = get_sub_field('banner_button_link');
                $banner_button_text = get_sub_field('banner_button_text');
                $hide_panel = get_sub_field('hide_panel');
                ?>
        <div class="page-head">
			
			
			
			
            <?php
					if($hide_panel) { } else {
			?>
				<div class="inner-page-hero">
					<div class="left">
						<h1 class="page-title"><?php echo $page_title; ?></h1>
						<p><?php echo $description; ?></p>
					</div>
					<div class="right">
						<?php if($banner_image and $banner_image_target): ; //condition 2 start ?>
						<a href="<?php echo $banner_image_target; ?>" target="_blank">
						<img class="page-feature-img" style="padding-bottom: 170px;" src="<?php echo $banner_image; ?>" />
						</a>
						<?php elseif($banner_image): ?>
						<img class="page-feature-img" src="<?php echo $banner_image; ?>" />
						<div class="overlay">
							<h1><?php echo $banner_image_text; ?></h1>
							<?php if ($banner_button_text): //condition 3 start ?>
							<a href="<?php echo $banner_button_link; ?>" target="_blank" class="button-pink">
							<?php echo $banner_button_text; ?>
							</a>
							<?php endif; //condition 3 end ?>
						</div>
						<!-- the follwoing condition will work for contact us page -->
						<?php elseif(!$banner_image_target and !$banner_button_link and !$banner_button_text): ?>
						<?php echo $banner_image_text; ?>
						<?php endif; //condition 2 end ?>
					</div>
				</div>
			<?php } ?>
        </div>
        <?php endwhile; //while loop end ?>
        <?php endif; //condition 1 end ?>		
        <?php the_content(); ?>
    </div>
</div>
<?php get_footer();?>
