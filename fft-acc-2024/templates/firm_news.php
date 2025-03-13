<?php

/**
Template Name: Firm News Page
**/

?>

<?php get_header(); ?>

<div class="inner-page-top">
  <div class="container">
    <h1 class="title animate__animated animate__fadeInLeft animate__slow"><?php the_title(); ?></h1>
    <img class="img-top animate__animated animate__fadeInDown animate__slow" src="/wp-content/uploads/2024/08/cubes-bottom-right-2.png" >
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

      
<div class="news-wrap">
  <div class="container">

    <?php
    $query = new WP_Query(
      array(
        'category_in' => array(4),
        'posts_per_page' => '9',
        'post_type' => 'post',
      )
    );

    if ( $query -> have_posts() ) {
      while ( $query -> have_posts() ) {
        $query -> the_post();
        $image = wp_get_attachment_image_src(
          get_post_thumbnail_id( $post -> ID ),
          'single-post-thumbnail'
        );
     ?>

      <article>
        <a href="<?php the_permalink();?>">
          <div class="news-bg-img">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" >
            <div class="transparent-layer"></div>
          </div>
          <div class="news-article">
            <h4><?php the_title(); ?></h4>
            <p class="news-date"><?php echo get_the_date('j F Y'); ?></p>
            <p><?php echo excerpt(20); ?></p>
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

<div class="testimonials-wrap">
  <div class="container">
    <h2>What our clients say</h2>
    <div>
      <?php echo do_shortcode('[testimonial_view id="1"]'); ?>
    </div>
  </div>
</div>

<div class="contact-form-wrap">
  <div class="container">
    <h2>Get in touch</h2>
    <p class="p-large">Ready to take the next step in your financial journey?</p>
    <p>Contact us today to find out how FFT can support you. Whether you need help with your personal finances or business accounting, our friendly and open-minded team is here to assist you.</p>
    <?php echo do_shortcode('[gravityform id="1" title="false"]'); ?>
  </div>
</div>

<?php get_footer();?>