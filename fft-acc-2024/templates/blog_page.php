<?php

/**
Template Name: Blog Page
**/

?>

<?php get_header(); ?>

<?php
  //check for page if it is newsletter or other blog page
  $newsletter_page = false;

  //checking if there is just one page or more pages for the posts 
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

  //checking the page if it is Blog Page, Firm News or Newsletter page
  if ( is_page( 138 ) ) { //Blog Page
    
    $args = array(        
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => 'blog',
        'posts_per_page' => '9',
        'paged' => $paged,
      );
    
    $query = new WP_Query($args);
    
    $tagline = "Read our latest blog – written by our experts – designed to help you in every aspect of your business!";
  }  

  else if ( is_page( 140 ) ) { //Newsletter Page
    
    $newsletter_page = true;
    
    $args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'category_name' => 'newsletter',
          'posts_per_page' => '-1',
//          'paged' => $paged,
        );
    
    $query = new WP_Query($args);
    
    $tagline = "Our recent newsletter";
    
    $newsletter_form_heading = "Sign up for our newsletter to get FREE insights into tax, business and your finances.";
  }

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

<?php if( $tagline ) { ?>
<div class="page-tagline">
  <div class="container">
    <h1><?php echo $tagline; ?></h1>
  </div>
</div>
<?php } ?>

<div class="news-wrap">
  <div class="container">
    <div class="all-news">

      <?php
      if( $query ) { //if condition 1
        
        if ( $query -> have_posts() ) { //if condition 2
          
          while ( $query -> have_posts() ) { //while loop
            
            $query -> the_post();

            $image = get_the_post_thumbnail_url();
            
            $post_link = get_permalink();
            
            if( $newsletter_page ) {
              $post_link = get_field('redirect_link');
            }

            if ( empty($image) ) {
              $image = '/wp-content/uploads/2024/09/Bees-2282212015-landscape.png';
            }
      ?>
      
      <article>
        <a href="<?php echo $post_link; ?>" style="background-image: url('<?php echo $image; ?>')">
          <div class="overlay">
            <h5><?php the_title(); ?></h5>
              <?php if(is_page( 140 )) : else : ?><p class="news-date"><?php echo get_the_date('j F Y'); ?></p><?php endif; ?>
            <p class="yellow-bg-button">Read More</p>
          </div>
        </a>
      </article>

      <?php } //while loop ?>

      <?php } //if condition 2 ?>

      <?php } //if condition 1 ?>

    </div>    
  </div>
</div>
  
<!-- Post Pagination -->
<?php if( !$newsletter_page ) { ?>
  <div class="post-pagination">
    <?php //previous_posts_link( '&laquo; PREV', $query->max_num_pages ); ?>
    <?php //next_posts_link( 'NEXT &raquo;', $query->max_num_pages ) ?>
    <?php
      $big = 999999999; // need an unlikely integer

      echo paginate_links( array(
        'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'  => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total'   => $query->max_num_pages,
        'prev_text' => '« Back',
      ) );
    ?>
  </div>
  <!-- Post Pagination -->
  <?php wp_reset_postdata(); ?>
<?php } ?>

      
<!-- if page is newsletter page -->
<?php if( $newsletter_page ) { ?>
<div class="contact-form-wrap newsletter-form">
  <div class="container">
    <h2><?php echo $newsletter_form_heading; ?></h2>
    <?php echo do_shortcode('[gravityform id="2" title="false"]'); ?>
  </div>
</div>
<?php } ?>
<!-------------------------------->

<div id="get-in-contact" class="contact-form-wrap">
  <div class="container">
    <h2>Get in touch</h2>
    <p class="p-large">Ready to take the next step in your financial journey?</p>
    <p>Contact us today to find out how FFT can support you. Whether you need help with your personal finances or business accounting, our friendly and open-minded team is here to assist you.</p>
    <?php echo do_shortcode('[gravityform id="1" title="false"]'); ?>
  </div>
</div>

<?php get_footer();?>