<?php get_header();?>

<!-- custom fields here -->
<?php if( have_rows('custom_team_details') ) { // 2nd if condition start
  // Loop through rows.
  while( have_rows('custom_team_details') ) { // 2nd while loop start
    the_row();
    // Load sub field value.
    $department = get_sub_field('department');
    $job_title = get_sub_field('job_title');
    $phone = get_sub_field('phone');
    $email = get_sub_field('email');
    $award_logo = get_sub_field('award_logo'); ?>
  <?php } // 2nd while loop end ?>
<?php } // 2nd if condition end ?>

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
        <div class="contact-info">
          <a href="Tel:<?php echo $phone; ?>"><i class="fa-solid fa-phone"></i><?php echo $phone; ?></a>
          <a href="mailto:<?php echo $email; ?>"><i class="fa-solid fa-envelope"></i><?php echo $email; ?></a>
        </div>
      </div>
      <div class="right">
        <h1><?php the_title(); ?></h1>
        <h2 class="sub-heading"><?php echo $job_title; ?> | <?php echo $department; ?></h2>
        <?php the_content(); ?>
        <?php if($award_logo): ?>
          <div class="award-logo">
            <h2>Awards</h2>
            <img src="<?php echo $award_logo; ?>" alt="<?php the_title(); ?>" />
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer();?>