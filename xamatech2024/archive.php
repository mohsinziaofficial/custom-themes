<?php get_header();?>
<div class="ArchiveWrap MainWrap">
	<div class="container">
    <?php
    // Fix pagination issue
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 9, // Adjust as needed
        'paged'          => $paged
    );

    $query = new WP_Query($args);
    ?>
		<?php if ($query->have_posts()) : ?>
			<div class="archive-loop">
				<!-- Start of the main loop. -->
				<?php while ( $query->have_posts() ) : $query->the_post();
//					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
				?>
        
          <article class="post-item">
            <div class="post-date">
              <p><?php echo get_the_date(); ?></p>
            </div>
            <a href="<?php the_permalink(); ?>">
              <div class="post-title">
                <h6><?php the_title(); ?></h6>
              </div>
            </a>          
            <div class="post-excerpt">
              <p>
                <a href="<?php the_permalink(); ?>">
                  <?php the_excerpt(); ?>
                </a>
              </p>
            </div>
            <div class="post-button">
              <a href="<?php the_permalink(); ?>" >Find Out More</a>
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