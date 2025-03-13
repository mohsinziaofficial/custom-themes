<?php
  get_header();

  $featured_image_url = get_the_post_thumbnail_url(); // Get the featured image URL
  $custom_title = get_field('custom_title');
  $custom_tag_line = get_field('custom_tag_line');

  $author_image = get_field('author_image');
  $author_name = get_field('author_name');
  $author_position = get_field('author_position');


  // Get the current post ID
  $current_post_id = get_the_ID();
  // Create a new WP_Query
  $query = new WP_Query( array(
    'posts_per_page' => 3, // Fetch all posts
    'post_type'      => 'post',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post__not_in'   => array( $current_post_id ), // Exclude the current post
  ) );

?>

<div class="PostPageWrap">
  <div class="container">
    <div class="post-page">
      
      <!-- post top section -->
      <div class="post-page-top">
        <!-- feature image div -->
        <div class="FeaturedImage" style="background-image: url('<?php echo $featured_image_url; ?>')"></div>
        <!-- post title and date -->
        <div class="text-overlay">
          
          <div class="post-custom-title">
            <h1 class="title"><?php the_title(); ?></h1>
          </div>          
          <p class="article-date"><?php echo get_the_date('j F'); ?></p>
          
        </div>
      </div>
      <!-- post content -->
      <div class="post-content">
        <div class="post-content-top">
          <div class="breadcrumbs-wrap">
            <?php
              if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
              }
            ?>
          </div>
          
          <?php if($custom_tag_line): ?>
            <div class="post-custom-tag-line">
              <p><strong><?php echo $custom_tag_line; ?></strong></p>
            </div>
          <?php endif; ?>

          <?php if($author_image || $author_name || $author_position): ?>
            <div class="post-author">
              <?php if($author_image): ?>
                <div class="author-image">
                  <img src="<?php echo $author_image; ?>" />
                </div>
              <?php endif; ?>
              
              <div class="author-detail">
                <?php if($author_name): ?>
                  <div class="author-name">
                    <p><?php echo $author_name; ?></p>
                  </div>
                <?php endif; ?>

                <?php if($author_position): ?>
                  <div class="author-position">
                    <p><?php echo $author_position; ?></p>
                  </div>
                <?php endif; ?>
              </div>
              
            </div>
          <?php endif; ?>
        </div>
        
        <div class="post-wrap">
          <!-- post text -->
          <div class="post-content-text">
            <?php the_content(); ?>
          </div>
          
          <!-- related news -->
          <?php if ( $query->have_posts() ) : ?>
            <div class="related-news">
              <?php
                while ( $query->have_posts() ) :
                  $query->the_post();
                  $image = get_the_post_thumbnail_url();
              ?>
              <div class="related-news-item">
                <a href="<?php the_permalink(); ?>">
                  <div class="related-news-img" style="background-image: url('<?php echo $image; ?>')"></div>
                  <p class="related-news-title"><strong><?php the_title(); ?></strong></p>
                  <p class="related-news-date"><?php echo get_the_date('j F'); ?></p>
                </a>
              </div>
              <?php
                endwhile;
                wp_reset_postdata();
              ?>
            </div>
          <?php endif; ?>
        </div>
        
      </div>      
    </div>
  </div>
</div>

<?php get_footer();?>