<?php

  /**
  Template Name: Resources Page
  **/

  get_header();

  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'guides',
    'posts_per_page' => '3',
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

<?php if ( !is_page(14) ) {  //check for page if it is insight page or resources page ?>

<div class="page-tagline">
  <div class="container">
    <h1>View our latest guides</h1>
  </div>
</div>

<div class="resource-page-guides">
  <div class="container">
    <div class="guides latest-guides">
      <?php
      
      if( $query ) { //if condition 1
        
        if ( $query -> have_posts() ) { //if condition 2
          
          while ( $query -> have_posts() ) { //while loop
            
            $query -> the_post();
            
            $title = get_the_title();
            $image_link = get_the_post_thumbnail_url();
            $post_link = get_field('redirect_link');
            $post_date = get_the_date('j F Y');

            if ( empty($image) ) {
              $image = '/wp-content/uploads/2024/09/Bees-2282212015-landscape.png';
            }
      ?>
      
      <article>
        <a href="<?php echo $post_link; ?>" target="_blank">
          
          <div class="resource-button-bg-hex">
            <div class="hex-background">
              <img src="<?php echo $image_link; ?>">
            </div>
          </div>
            
          <div class="overlay">
            <h5><?php the_title(); ?></h5>
<!--              <p class="news-date"><?php //echo get_the_date('j F Y'); ?></p>-->
            <p class="yellow-border-button">Read More</p>
          </div>
          
        </a>
      </article>

      <?php } //while loop ?>

      <?php } //if condition 2 ?>

      <?php } //if condition 1 ?>
      
      <?php wp_reset_postdata(); ?>

    </div>
  </div>
</div>


<div class="view-all-guides">
  <div class="container">
    <a href="/guides/" class="orange-border-button">View all guides</a>
  </div>
</div>

<?php } ?>

<div class="PageWrap MainWrap">
	<div class="container">
    <div class="content-main">
        <?php the_content(); ?>
    </div>
	</div>
</div>

<div id="get-in-contact" class="contact-form-wrap">
  <div class="container">
    <h2>Get in touch</h2>
    <p class="p-large">Ready to take the next step in your financial journey?</p>
    <p>Contact us today to find out how FFT can support you. Whether you need help with your personal finances or business accounting, our friendly and open-minded team is here to assist you.</p>
    <?php echo do_shortcode('[gravityform id="1" title="false"]'); ?>
  </div>
</div>

<?php get_footer();?>