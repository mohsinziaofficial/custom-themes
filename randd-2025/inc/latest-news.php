</div><!-- End of ContentWrap -->
<div class="SlidesBackground">
  <div class="SliderWrap">
    <div class="SliderInner">
      <?php
        $query = new WP_Query(array(
          'posts_per_page' => 4, // Fetch all posts (set a specific number if needed)
          'post_type'      => 'post', // Ensure it's a post type
          'orderby'        => 'date', // Order by post date
          'order'          => 'DESC', // Latest posts first
          'offset'         => 1, // Skip the first (latest) post
        ));
      
        if ( $query->have_posts() ) {
          
          while ( $query->have_posts() ) {
            
          $query->the_post();
          $image = get_the_post_thumbnail_url(); // Get the featured image URL
          // Initialize variable
          $post_cat = "";
          $category_link = '';
          $category_colour = 'var(--green)'; // Default color if no ACF field is set
          $text_colour = 'var(--white)'; // Default text color
            
          // Get the primary category
          $primary_category = null;
          $categories = get_the_category();

          if ( !empty( $categories ) ) {
            // Check if Yoast SEO is available
            if ( class_exists( 'WPSEO_Primary_Term' ) ) {
              $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_ID() );
              $primary_category_id = $wpseo_primary_term->get_primary_term();

              if ( is_numeric( $primary_category_id ) ) {
                $primary_category = get_category( $primary_category_id );
                $post_cat = esc_html( $primary_category->name );
                $category_colour = get_field( 'cat_colour', 'category_' . $primary_category->term_id ); // Get ACF field for category
              }
            }
            // Fallback to the first category if primary category is not set
            if ( is_null( $primary_category ) ) {
              $primary_category = $categories[ 0 ];
              $post_cat = esc_html( $primary_category->name );
              $category_colour = get_field( 'cat_colour', 'category_' . $categories[ 0 ]->term_id ); // Get ACF field for category
            }
          }

          // Default to a fallback color if the HEX value is not set or is empty
          if ( empty( $category_colour ) ) {
            $category_colour = 'var(--green)'; // Default fallback color
          }

          // Check for specific background color to set text color
          if ( $category_colour === '#f8eb1f' ) {
            $text_colour = 'var(--textcolour)'; // Black text for yellow background
          } else {
            $text_colour = 'var(--white)'; // White text for other backgrounds
          }
      ?>
        <div class="SlideContent">
          <article>
            <a href="<?php the_permalink(); ?>">
              <div class="FeatureImage" style="background-image: url('<?php echo $image; ?>');"></div>
              <div class="SlideArticle">
                <h6 class="article-title"><?php the_title(); ?></h6>
                <p class="article-date"><?php echo get_the_date('j F'); ?></p>
                <!-- <p><?php //echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p> -->
              </div>
            </a>
            <div class="article-category">
            
              <a href="<?php the_permalink(); ?>" class="btn btn-blue" style="background-color: <?php echo esc_attr($category_colour); ?>; color: <?php echo esc_attr($text_colour); ?>;"><?php echo $post_cat; ?></a>
            </div>          
          </article>
        </div>

      <?php
          }
        }
        wp_reset_postdata();
      ?>
    </div>
  </div>
</div>