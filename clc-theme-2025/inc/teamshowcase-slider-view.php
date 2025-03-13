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
        'tax_query'  =>  array(
        array(
        'taxonomy' => 'tsas-category',
        'terms' => $archiveCat['cat'],
        'operator' => 'IN'
        )
      ),

    )
  );
?>


<div class="SlidesBackground">
  <div class="container SliderWrap">
    <?php if ( $query->have_posts() ) { // 1st if condition start ?>
      <div class="titlebox">
        <a href="/people/"><div class="title">Your Key Contacts</div></a>
      </div>
      <div class="SliderInner">
        <?php while ( $query->have_posts() ) { // 1st while loop start
          $query->the_post();
          $image = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>

          <div class="SlideContent">
            <article>
              <a href="<?php the_permalink();?>">
                <div class="FeatureImage" style="background-image: url('<?php echo $image; ?>');"></div>
                <div class="SlideArticle">
                  <h4><?php the_title(); ?></h4>

                  <?php if( have_rows('custom_team_details') ) { // 2nd if condition start
                    // Loop through rows.
                    while( have_rows('custom_team_details') ) { // 2nd while loop start
                      the_row();
                      // Load sub field value.
                      $department = get_sub_field('department');
                      $job_title = get_sub_field('job_title');
                      $phone = get_sub_field('phone');
                      $email = get_sub_field('email'); ?>

                      <p><span>T:</span> <?php echo $phone; ?></p>
                      <p><span>E:</span> <?php echo $email; ?></p>

                    <?php } // 2nd while loop end ?>
                  <?php } // 2nd if condition end ?>

                  <div class="ArticleContent">
                    <?php the_content(); ?>
                  </div>

                </div>
              </a>
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
