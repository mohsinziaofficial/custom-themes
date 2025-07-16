<?php get_header();?>
<div class="PostWrap MainWrap">
	<div class="OpeningContent">
		<div class="container">
			<div class="TitleWrap">
				<?php if (function_exists('yoast_breadcrumb')): ?>
					<?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
				<?php endif; ?>

				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	<div class="PostContent">
		<div class="container">
			<?php if ( has_post_thumbnail() ) : ?>
				<img class="FeaturedImage" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
			<?php endif; ?>

			<?php the_content(); ?>
		</div>
	</div>
</div>	
<?php get_footer();?>