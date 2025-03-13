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

<div class="GridBackground">
  <div class="container GridWrap">
    <?php if ( $query->have_posts() ) { // 1st if condition start ?>
      <div class="GridInner">
        <?php while ( $query->have_posts() ) { // 1st while loop start
          $query->the_post();
          $image = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>

          <div class="GridContent">
            <article>
              <a class="<?php the_title(); ?>" href="<?php the_permalink();?>">
                <img class="FeaturedImage" src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
              </a>
              <div class="GridArticle">

              <?php if( have_rows('custom_team_details') ) { // 2nd if condition start
                // Loop through rows.
                while( have_rows('custom_team_details') ) { // 2nd while loop start
                  the_row();
                  // Load sub field value.
                  $phone = get_sub_field('phone');
                  $email = get_sub_field('email'); ?>

                  <div class="contact-info">
                    <p>
                      <a href="Tel:<?php echo $phone; ?>"><i class="fa-solid fa-phone"></i></a>
                    </p>
                    <p>
                      <a href="mailto:<?php echo $email; ?>"><i class="fa-solid fa-envelope"></i></a>
                    </p>
                  </div>

                <?php } // 2nd while loop end ?>
              <?php } // 2nd if condition end ?>
              
              <h4><?php the_title(); ?></h4>
              </div>
            </article>
          </div>
        
        <?php } // 1st while loop end ?>
      </div>
    <?php } // 1st if condition end ?>
    <?php wp_reset_postdata(); ?>
    <!-- php code end -->
  </div>
</div>


<?php
	// Return everything in the object buffer.
	return ob_get_clean();
?>