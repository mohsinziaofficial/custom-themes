<?php get_header();?>
<div class="PageTitle">
	<div class="container">
		
	</div>
</div>
<div class="PostWrap MainWrap">
	<div class="container">
        <div class="postt-content-wrapper">
        <div class="SingleDate"><p><span><?php echo get_the_date('j F Y'); ?></span></p></div>
        <h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
        </div>    
        <div class="post-FI-wrapper">
        <img class="FeaturedImage" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        </div>
	</div>	
</div>	
<?php get_footer();?>