<?php get_header();

include('inc/scatter-img.php');

?>
<div class="PageBanner">
	<div class="container">
		<div class="PageBannerInner slide-in-left">
			<h1><?php the_archive_title(); ?></h1>
			<div class="PageBannerInnerContent">
				<?php if(category_description()){ ?>
					<?php echo category_description(); ?>
				<?php } else { ?>
					<p>Delivering you insightful content and our latest news and developments</p>
				<?php } ?>
			</div>
		</div>
		<div class="pageScatterImage fade-in">
			<img src="<?php echo $selectedBg; ?>">
		</div>
	</div>
</div>

<div class="ArchiveWrap PageContentWrap">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="archive-loop">
				<!-- Start of the main loop. -->
				<?php while ( have_posts() ) : the_post();
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
				?>
					<div class="fade-bottom reveal">
						<article <?php post_class(array('archive-post')) ?>>
							<p class="ArticleDate"><?php echo get_the_date('j F Y'); ?></p>
							<hr>
							<div class="InnerArticle">
								<h3><a href="<?php the_permalink() ?>">
									<?php the_title() ?>
									</a>
								</h3>
								<p class="ArticleExcerpt"><?php echo excerpt(30); ?></p>
								<a class="Button" href="<?php the_permalink() ?>">Find out more</a>
							</div>
						</article>
					</div>
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