<?php get_header();?>
<div class="PageWrap MainWrap">
	<div class="container">
    <div class="breadcrumbs-wrap">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
              yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
         } ?>
    </div>
    <!-- custom fields here -->
    <?php
      if( have_rows('inner_page_top') ): //condition 1 start
        while ( have_rows('inner_page_top') ) : the_row(); //while loop start
          $tag_line = get_sub_field('tag_line');
          $content_left = get_sub_field('content_left');
          $content_right = get_sub_field('content_right');
        endwhile; //while loop end
      endif; //condition 1 end
      ?>
    <h1 class="page-heading"><?php the_title(); ?></h1>
    <?php if(!empty($tag_line)): ?>
      <h2 class="tag-line"><?php echo $tag_line; ?></h2>
    <?php endif; ?>
    <?php if($content_left || $content_right): ?>
      <div class="inner_page_top animate__animated animate__fadeInUp animate__delay-1s">
        <div class="left">
          <p><?php echo $content_left; ?></p>
        </div>
        <div class="right">
          <p><?php echo $content_right; ?></p>
        </div>
      </div>
    <?php endif; ?>
    
    <div class="main-content">
      <?php the_content(); ?>
    </div>
    
    <div class="insights-wrapper animate__delay-1s">
      <div class="insights-heading">
        <h1>Insights</h1>
        <p><a href="/articles-publications/">More news <i class="fa-solid fa-chevron-up"></i></a></p>
      </div>    
      <div class="insights">
        <?php $query = new WP_Query(
          array(
  //          'category_in' => array(6),
            'posts_per_page' => '3',
            'post_type' => 'post',
            )
          );
          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
            $query->the_post();
        ?>
            <article>
              <a href="<?php the_permalink();?>">
                <div class="insight-content">
                  <h4><?php the_title(); ?></h4>
                  <p><?php the_date(); ?></p>
                  <p><?php echo excerpt(10); ?></p>
                </div>
              </a>
            </article>
        <?php
            }
          }
          wp_reset_postdata();
        ?>
      </div>
    </div>
	</div>
</div>
<?php get_footer();?>