<?php

/**

* Template Name: Resources Page Template

*/

get_header();

$query = new WP_Query( array(
  'posts_per_page' => -1, // Fetch all posts
  'post_type' => 'post',
  'orderby' => 'date',
  'order' => 'DESC',
) );

$custom_tag_line = get_field( 'custom_tag_line' );
$custom_text = get_field( 'custom_text' );

?>
<div class="PageWrap MainWrap">
  <div class="container">
    <div class="inner-page">
      <div class="inner-page-top">
        <h1 class="page-title">
          <?php the_title(); ?>
        </h1>
        <?php  if($custom_tag_line): ?>
        <p class="tag-line">
          <?php the_field('custom_tag_line');  ?>
        </p>
        <?php endif; ?>
        <?php if($custom_text): ?>
        <p class="tag-line">
          <?php the_field('custom_text');  ?>
        </p>
        <?php endif; ?>
      </div>
      
      <div class="all-news">
      <?php
      if ( $query ) { //if condition 1

        if ( $query->have_posts() ) { //if condition 2
          $count = 1;
          $total_posts = $query->found_posts;
          while ( $query->have_posts() ) { //while loop

            $query->the_post();

            $title = get_the_title();
            $image_link = get_the_post_thumbnail_url();
            $post_date = get_the_date( 'j F Y' );

            if ( empty( $image ) ) {
              $image = '/wp-content/uploads/2024/09/Bees-2282212015-landscape.png';
            }
            
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
              $text_colour = 'var(--navy)'; // Black text for yellow background
            } else {
              $text_colour = 'var(--white)'; // White text for other backgrounds
            }

            // Check if it's the first post in the row
            if ( ( $count - 1 ) % 5 == 0 ) {
            ?>
            <div class="news-row"> 
              <!-- First article in the row -->
              
              <div class="big-article <?php if($category_colour == "#f8eb1f"): ?>yellow-bg<?php endif;?>" style="background-color: <?php echo esc_attr($category_colour); ?>;">
                <article>
                  <a href="<?php the_permalink(); ?>">
                    <div class="article-img" style="background-image: url('<?php echo $image_link; ?>');">
                      
                      <div class="article-category">
                        <p class="btn btn-blue" style="background-color: <?php echo esc_attr($category_colour); ?>; color: <?php echo esc_attr($text_colour); ?>;"><?php echo $post_cat; ?></p>
                      </div>
                    </div>
                    <div class="article-content">
                      <h5 class="article-title">
                        <?php the_title(); ?>
                      </h5>
                      <p class="article-date"><?php echo get_the_date('j F'); ?></p>
                      <p class="btn btn-navy">Read Now</p>
                    </div>
                  </a>
                </article>
              </div>
              <?php
              } else {

                // Add the remaining articles to an array
                $remaining_articles[] = '
                <article>
                  <a href="' . get_permalink() . '">
                    <div class="article-img"  style="background-image: url('. $image_link .');">
                                        
                      <div class="article-category">
                        <p class="btn btn-blue" style="background-color: ' . esc_attr( $category_colour ) . '; color: ' . esc_attr( $text_colour ) . ';">' . $post_cat . '</p>
                      </div>
                    </div>
                    <div class="article-content">
                      <p><strong>' . get_the_title() . '</strong></p>
                      <p class="article-date">' . get_the_date( 'j F' ) . '</p>
                    </div>
                  </a>
                </article>
              ';
              }

              // End the row after the 5th post or the last post
              if ( $count % 5 == 0 || $count == $total_posts ) {
                // Display all remaining articles in one div
                if ( !empty( $remaining_articles ) ) {
                  echo '<div class="remaining-articles">' . implode( '', $remaining_articles ) . '</div>';
                  $remaining_articles = []; // Reset the array after displaying
                }
                ?>
            </div>
            <!-- Close the news-row div -->
            <?php
              }
            $count++;
            } //while loop
          } //if condition 2
        } //if condition 1
      ?>
      </div>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
</div>
<?php get_footer();?>
