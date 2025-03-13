<section>
  <div class="container">
    <?php
      // Arguments for WP_Query
      $args = array(
        'post_type'      => 'post',   // Fetch posts
        'posts_per_page' => 9,        // Number of posts to show
        'orderby'        => 'date',   // Order by date
        'order'          => 'DESC'    // Show latest first
      );

      // Query the posts
      $news_query = new WP_Query($args);

      // Check if posts exist
      if ($news_query->have_posts()) : ?>

      <div class="LatestPostWrap">
      <?php while ($news_query->have_posts()) : $news_query->the_post();
          $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
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

      <?php
        endwhile;
        wp_reset_postdata(); // Reset post data
      ?>
      </div>
    
      <div class="post-button">
        <a href="/news/page/2" >Load More Posts</a>
      </div>

      <?php else : ?>
      <p>No news posts available.</p>

    <?php endif; ?>

  </div>
</section>