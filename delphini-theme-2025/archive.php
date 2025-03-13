<?php get_header();?>
<div class="ArchiveWrap MainWrap">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="archive-loop">
				<!-- Start of the main loop. -->
				<?php while ( have_posts() ) : the_post();
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
				?>
						<article <?php post_class(array('archive-post')) ?>>
						<a href="<?php the_permalink() ?>" class="ArchiveImg" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
							<p class="ArticleDate"><span><?php echo get_the_date('j M Y'); ?></span></p>
						</a>
						<div class="postContentWrap">
							<h4><a href="<?php the_permalink() ?>">
								<?php the_title() ?>
								</a>
							</h4>
							<p><?php echo custom_excerpt(20); ?></p>
						</div>
						<a class="Button" href="<?php the_permalink() ?>">Find out more</a>
					</article>
				<?php endwhile; ?>
				<!-- End of the main loop -->
			</div>
			<div class="nav-pagination"><?php the_posts_pagination(); ?></div>
			<?php else : ?>
				<?php _e('Sorry, no posts matched your criteria.'); ?>
		<?php endif; ?>
	</div>	
</div>	
<?php get_footer();?>