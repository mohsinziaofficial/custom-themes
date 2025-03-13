<?php
  $feature_img = get_the_post_thumbnail_url();
  if( empty($feature_img) ) {
    $feature_img = "/wp-content/uploads/2024/09/Bees-2282212015-landscape.png";
  }
  $category = get_the_category();
  $cat_name = $category[0]->cat_name;

  //custom fields
  $phone = get_field('phone_number');
  $email = get_field('email');

  get_header();
?>


<div class="inner-page-top">
  <div class="container">
    <h1 class="title"><?php echo the_title(); ?></h1>
<!--    <img class="img-top" src="/wp-content/uploads/2024/08/cubes-bottom-right-2.png" >-->
  </div>
</div>

<div class="team-single-page">
  
  <div class="container">
    
    <div class="breadcrumbs-wrap">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
              yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
         } ?>
    </div>
    
    <div class="team-member-profile">
      
      <div class="left">
        <img class="FeaturedImage" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
      </div>
      
      <div class="right">
<!--        <h1><?php //the_title(); ?></h1>-->
        <div class="team-member-info">
          <p><a href="Tel:<?php echo $phone; ?>"><i class="fa-solid fa-phone"></i> &nbsp; <?php echo $phone; ?></a> &nbsp; &nbsp; <a href="mailto:<?php echo $email; ?>"><i class="fa-solid fa-envelope"></i> &nbsp; <?php echo $email; ?></a></p>
        </div>
        <div class="team-member-description">
          <?php the_content(); ?>
        </div>
      </div>
      
    </div>
    
  </div>
  
  <img decoding="async" src="/wp-content/uploads/2024/09/FFT-Cubes.png" class="single-team-bg">
  
</div>
<?php get_footer();?>