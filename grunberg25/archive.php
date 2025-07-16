<?php get_header();?>
<div class="ArchiveWrap MainWrap">
	<div class="OpeningContent">
		<div class="container">
			<div class="TitleWrap">
				<?php if (function_exists('yoast_breadcrumb')): ?>
					<?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
				<?php endif; ?>

				<h1><?php the_archive_title(); ?></h1>
			</div>
		</div>
	</div>
	<div class="ArchiveItemWrap">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<div class="archive-loop">
					<!-- Start of the main loop. -->
					<?php while ( have_posts() ) : the_post(); ?>
						<article <?php post_class(array('archive-post')) ?>>
							<h3><a href="<?php the_permalink() ?>">
								<?php the_title() ?>
								</a>
							</h3>
							<p class="ArticleDate"><?php echo get_the_date('j F Y'); ?></p>
							<p>
							<?php
							$excerpt = get_the_excerpt();
							echo wp_trim_words( $excerpt, 20, '...' );
							?>
							</p>

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
</div>	
<?php get_footer();?>