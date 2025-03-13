<?php
  get_header();
  $date = get_field('webinar_date');
  $time = get_field('webinar_time');
  $registration_link = get_field('webinar_registration_link');
?>

  <div class="post-page-header">
    <div class="container">
      <div class="page-head">
        <div class="inner-page-hero">
          <div class="left">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php if( $date && $time ): //condition 1 start ?>
            <h2 class="color-white"><?php echo $date; ?></h2>
            <h2 class="color-white"><?php echo $time; ?></h2>
            <a class="button-pink" href="<?php echo $registration_link; ?>" target="_blank"><strong>Register Now</strong></a>
            <?php endif; ?>
          </div>
          <div class="right">
            <img class="post-feature-img" src="/wp-content/themes/xamatech2024/img/webinar-feature-img.png" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="container" style="padding-top: 20px;">
	<div class="breadcrumbs-wrap">
		<?php
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		} ?>
	</div>
</div>
  <div class="post-content">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </div>
  <hr>

<?php get_footer();?>