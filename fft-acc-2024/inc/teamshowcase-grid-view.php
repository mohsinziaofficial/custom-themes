<?php
  //This code block will get the arguments from shortcode,
  //here we are getting category as an argument.
	$default = array(
		'cat' => '',
	);
	$archiveCat = shortcode_atts($default, $atts);

	ob_start();
?>


<!-- php code start -->
<?php $query = new WP_Query(
    array(
      'posts_per_page' => -1, //Enter the number of posts to display, -1 will display all posts
      'post_type' => 'team_showcase_post',
      'orderby' => 'title',
      'order' => 'ASC',
      'tax_query'  =>  array(
        array(
          'taxonomy' => 'tsas-category',
          'terms' => $archiveCat['cat'],
          'operator' => 'IN',
        )
      ),

    )
  );
?>

<div class="TeamGridBackground">
  <img decoding="async" src="/wp-content/uploads/2024/09/team-cubes-top-left-1.png" class="cubes-top-left">
  <div class="container TeamGridWrap">
    <?php if ( $query->have_posts() ) { // 1st if condition start ?>
      <div class="TeamGridInner">
        <?php while ( $query->have_posts() ) { // 1st while loop start
          $query->the_post();
          $image = get_the_post_thumbnail_url(get_the_ID(),'full');
        
          // Get ACF field value.
          $phone = get_field('phone_number');
          $email = get_field('email'); ?>

          <div class="TeamGridContent">
            <article>
              <a href="<?php the_permalink();?>">
                <img class="TeamFeaturedImage" src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
              </a>
              
              <div class="TeamGridArticle">
                <h4><?php the_title(); ?></h4>     
                <div class="team-contact-info">
                  <a href="Tel:<?php echo $phone; ?>"><i class="fa-solid fa-phone"></i></a>
                  &nbsp;&nbsp;
                  <a href="mailto:<?php echo $email; ?>"><i class="fa-solid fa-envelope"></i></a>
                </div>           
              </div>
              
            </article>
          </div>
        
        <?php } // 1st while loop end ?>
      </div>
    <?php } // 1st if condition end ?>
    <?php wp_reset_postdata(); ?>
    <!-- php code end -->
  </div>
  <img decoding="async" src="/wp-content/uploads/2024/09/team-cubes-bottom-right-1.png" class="cubes-bottom-right">
</div>


<?php
	// Return everything in the object buffer.
	return ob_get_clean();
?>