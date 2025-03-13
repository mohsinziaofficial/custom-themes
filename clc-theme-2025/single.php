<?php

get_header();

$author = get_field('author');
$custom_team_details = get_field('custom_team_details', $author);

$name = $author->post_title;
$job = $custom_team_details['job_title'];
$phone = $custom_team_details['phone'];
$email = $custom_team_details['email'];
$img = get_the_post_thumbnail_url($author);

?>
<div class="container">
  <div class="breadcrumbs-wrap">
      <?php
          if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
       } ?>
  </div>
</div>
<div class="single-post-page">
  <div class="container">
    <div class="post-wrapper">
      <?php if($img): ?>
        <div class="FeaturedImage" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
      <?php endif; ?>

      <h1 class="post-title"><?php the_title(); ?></h1>
      <p class="post-date"><?php the_date(); ?></p>
      <?php the_content(); ?>
    </div>    
  </div>
  
  <?php if($author): ?>
    <div class="post-author-wrapper">
      <div class="container"> 
        <div class="author-profile">
          <div class="author-img">
            <img src="<?php echo $img; ?>">
          </div>
          <div class="author-details">
            <div class="text-details">
              <h4>Author: <span><?php echo $name; ?></span></h4>
              <h4>Position: <span><?php echo $job; ?></span></h4>
              <h4>Telephone: <span><?php echo $phone; ?></span></h4>
              <h4>Email: <a href="mailto:<?php echo $email; ?>"><span><?php echo $email; ?></span></a></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>   
<?php get_footer();?>