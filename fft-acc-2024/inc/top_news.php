<?php
  $query = new WP_Query(
    array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'category_name' => 'blog',
      'posts_per_page' => '3',
    )
  );
  if ( $query->have_posts() ) { //if condition
    
    while ( $query->have_posts() ) { //while loop
      
    $query->the_post();

    $image = get_the_post_thumbnail_url();
      

    if ( empty($image) ) {
      $image = '/wp-content/uploads/2024/09/Bees-2282212015-landscape.png';
    }
      
?>

  <article>
    <a href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $image; ?>')">
      <div class="overlay">
        <h5><?php the_title(); ?></h5>
          <p class="news-date"><?php echo get_the_date('j F Y'); ?></p>
        <p class="yellow-bg-button">Read More</p>
      </div>
    </a>
  </article>

<?php } //while loop ?>

<?php } //if condition ?>

<?php wp_reset_postdata(); ?>