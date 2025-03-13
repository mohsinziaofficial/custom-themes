<?php

  get_header();

  $featured_image_url = get_the_post_thumbnail_url(); // Get the featured image URL
  $custom_title = get_field('custom_title');
  $custom_tag_line = get_field('custom_tag_line');
  
  //getting one post to show in hero section on home page
  $query = new WP_Query(array(
      'posts_per_page' => 1, // Fetch only the latest post
      'post_type'      => 'post', // Ensure it's a post type
      'orderby'        => 'date', // Order by the post date
      'order'          => 'DESC', // Get the latest post
  ));



?>
<div class="page-hero">
  <div class="container">
    <div class="bg-and-news">
      <!-- Feature image left div -->
      <div class="left" style="background-image: url('<?php echo $featured_image_url; ?>')"></div>
      
      <!-- First latest news in right div -->
      <div class="right">
        <?php
        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
            
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
                $category_colour = get_field( 'cat_colour', 'category_' . $primary_category->term_id ); // Get ACF field for category
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
        ?>
          <article class="hero-article" style="background-color: <?php echo $category_colour; ?>;">
            <a href="<?php the_permalink();?>">
              <h1 class="article-title" style="color: <?php echo $text_colour; ?>;"><?php the_title(); ?></h1>
              <p class="article-date" style="color: <?php echo $text_colour; ?>;"><?php echo get_the_date('j F'); ?></p>
              <a class="btn btn-navy" href="<?php the_permalink();?>">Read Now</a>
            </a>
          </article>
        <?php
          }
        }
        wp_reset_postdata();
        ?>
      </div>
    </div>

    <div class="text-overlay">
      <h1 class="custom-title"><?php echo $custom_title; ?></h1>
      <p class="custom-tag-line"><?php echo $custom_tag_line; ?></p>
    </div>
  </div>
</div>

<div class="main-content">
  <div class="container">
    <?php
    // Include the PHP file from the inc folder
    include get_template_directory() . '/inc/latest-news.php';
    ?>
  </div>
</div>
<?php get_footer();?>