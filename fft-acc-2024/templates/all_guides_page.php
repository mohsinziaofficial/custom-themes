<?php

  /**
  Template Name: All Guides Page
  **/

  get_header();

  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'guides',
    'posts_per_page' => '-1',
  );

  $query = new WP_Query($args);

?>

<div class="inner-page-top">
  <div class="container">
    <h1 class="title"><?php the_title(); ?></h1>
    <img class="img-top" src="/wp-content/uploads/2024/08/cubes-bottom-right-2.png" >
  </div>
</div>

<div class="PageWrap MainWrap">
	<div class="container">
    <div class="breadcrumbs-wrap">
      <?php if(function_exists('yoast_breadcrumb')) {
          yoast_breadcrumb('<span id="breadcrumbs">','</span>');
        }
      ?>
    </div>
	</div>
</div>

<div class="page-tagline">
  <div class="container">
    <h1>View our latest guides</h1>
  </div>
</div>

<!-- for desktop -->
<div class="all-guides layout-desktop">
  <div class="container">
    <div class="guides">
      <?php
      
      if( $query ) { //if condition 1
        
        if ( $query -> have_posts() ) { //if condition 2
          $count = 1;
          $total_posts = $query -> found_posts;
          while ( $query -> have_posts() ) { //while loop
            
            $query -> the_post();
            
            $title = get_the_title();
            $image_link = get_the_post_thumbnail_url();
            $post_link = get_field('redirect_link');
            $post_date = get_the_date('j F Y');

            if ( empty($image) ) {
              $image = '/wp-content/uploads/2024/09/Bees-2282212015-landscape.png';
            } ?>
      
            <?php if ( ($count - 1) % 3 == 0 ) { // Open a new row every 3 posts ?>
            <div class="guides-row">
            <?php } ?>

              <article>
                <a href="<?php echo $post_link; ?>" target="_blank">

                  <div class="resource-button-bg-hex">
                    <div class="hex-background">
                      <img src="<?php echo $image_link; ?>">
                    </div>
                  </div>

                  <div class="overlay">
                    <h5><?php the_title(); ?></h5>
<!--                    <p class="news-date"><?php //echo get_the_date('j F Y'); ?></p>-->
                    <p class="yellow-border-button">Read More</p>
                  </div>

                </a>
              </article>
            <?php if ( $count % 3 == 0 || $count == $total_posts ) { ?>
            </div>
            <?php } ?>

            <?php $count++; ?>
      
          <?php } //while loop ?>
        
        <?php } //if condition 2 ?>
      
      <?php } //if condition 1 ?>

    </div>
  </div>
</div>

<!-- for tablet layout-->
<div class="all-guides layout-tablet">
  <div class="container">
    <div class="guides">
      <?php
      
      if( $query ) { //if condition 1
        
        if ( $query -> have_posts() ) { //if condition 2
          $count = 1;
          $total_posts = $query -> found_posts;
          while ( $query -> have_posts() ) { //while loop
            
            $query -> the_post();
            
            $title = get_the_title();
            $image_link = get_the_post_thumbnail_url();
            $post_link = get_field('redirect_link');
            $post_date = get_the_date('j F Y');

            if ( empty($image) ) {
              $image = '/wp-content/uploads/2024/09/Bees-2282212015-landscape.png';
            } ?>
      
            <?php if ( ($count - 1) % 2 == 0 ) { // Open a new row every 2 posts ?>
            <div class="guides-row">
            <?php } ?>

              <article>
                <a href="<?php echo $post_link; ?>">

                  <div class="resource-button-bg-hex">
                    <div class="hex-background">
                      <img src="<?php echo $image_link; ?>">
                    </div>
                  </div>

                  <div class="overlay">
                    <h5><?php the_title(); ?></h5>
<!--                    <p class="news-date"><?php //echo get_the_date('j F Y'); ?></p>-->
                    <p class="yellow-border-button">Read More</p>
                  </div>

                </a>
              </article>
            <?php if ( $count % 2 == 0 || $count == $total_posts ) { ?>
            </div>
            <?php } ?>

            <?php $count++; ?>
      
          <?php } //while loop ?>
        
        <?php } //if condition 2 ?>
      
      <?php } //if condition 1 ?>

    </div>
  </div>
</div>

<!-- for mobile -->
<div class="all-guides layout-mobile">
  <div class="container">
    <div class="guides">
            <?php //if ( ($count - 1) % 3 == 0 ) { // Open a new row every 3 posts ?>
            <div class="guides-row-single">
            <?php //} ?>
      <?php
      
      if( $query ) { //if condition 1
        
        if ( $query -> have_posts() ) { //if condition 2
          $count = 1;
          $total_posts = $query -> found_posts;
          while ( $query -> have_posts() ) { //while loop
            
            $query -> the_post();
            
            $title = get_the_title();
            $image_link = get_the_post_thumbnail_url();
            $post_link = get_field('redirect_link');
            $post_date = get_the_date('j F Y');

            if ( empty($image) ) {
              $image = '/wp-content/uploads/2024/09/Bees-2282212015-landscape.png';
            } ?>
      

              <article>
                <a href="<?php echo $post_link; ?>">

                  <div class="resource-button-bg-hex">
                    <div class="hex-background">
                      <img src="<?php echo $image_link; ?>">
                    </div>
                  </div>

                  <div class="overlay">
                    <h5><?php the_title(); ?></h5>
<!--                    <p class="news-date"><?php //echo get_the_date('j F Y'); ?></p>-->
                    <p class="yellow-border-button">Read More</p>
                  </div>

                </a>
              </article>

            <?php $count++; ?>
      
          <?php } //while loop ?>
        
        <?php } //if condition 2 ?>
      
      <?php } //if condition 1 ?>

            <?php //if ( $count % 3 == 0 || $count == $total_posts ) { ?>
            </div>
            <?php //} ?>
    </div>
  </div>
</div>

<?php wp_reset_postdata(); ?>

<div id="get-in-contact" class="contact-form-wrap">
  <div class="container">
    <h2>Get in touch</h2>
    <p class="p-large">Ready to take the next step in your financial journey?</p>
    <p>Contact us today to find out how FFT can support you. Whether you need help with your personal finances or business accounting, our friendly and open-minded team is here to assist you.</p>
    <?php echo do_shortcode('[gravityform id="1" title="false"]'); ?>
  </div>
</div>

<?php get_footer();?>