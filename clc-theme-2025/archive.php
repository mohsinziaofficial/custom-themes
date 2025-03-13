<?php get_header();?>
<div class="ArchiveWrap MainWrap">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="archive-loop">
				<!-- Start of the main loop. -->
				<?php while ( have_posts() ) : the_post();
					$featured_img_url = get_the_post_thumbnail_url() ?: "/wp-content/uploads/2024/10/clc-logo.jpg";
				?>
					<article <?php post_class(array('archive-post')) ?>>
						<a href="<?php the_permalink() ?>">
							<div class="ArchiveImage" style= "background-image: url('<?php echo $featured_img_url; ?>')"></div>
						</a>
						<div class="postContentWrap">
							<h3><a href="<?php the_permalink() ?>">
								<?php the_title() ?>
								</a>
							</h3>
							<p class="ArticleDate"><?php echo get_the_date('j F Y'); ?></p>
							<a class="Button" href="<?php the_permalink() ?>">Find out more</a>
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