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
						<a href="<?php the_permalink() ?>">
							<img class="ArchiveImage" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
						</a>
						<div class="postContentWrap">
							<p class="ArticleTitle"><a href="<?php the_permalink() ?>">
								<?php the_title() ?>
								</a>
							</p>
							<p class="ArticleDate"><?php echo get_the_date('j F Y'); ?></p>
							<a class="btn btn-blue" href="<?php the_permalink() ?>">Find out more</a>
						</div>

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