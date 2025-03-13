<?php
  get_header();
  
  $event_type = get_field('event_type');
  $event_venue = get_field('event_venue');
  $event_date = get_field('event_date');
  $event_time = get_field('event_time');
  $event_connecting_text = get_field('connecting_text');
  $event_register_link = get_field('event_register_link');
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
        <h1 class="post-title"><?php the_title(); ?></h1>
        <div class="event-venue-details">
          <p class="event-type"><?php echo $event_type; ?></p>
          <p class="event-venue"><strong>Venue:</strong> <?php echo $event_venue; ?></p>
          <p class="event-date"><strong>Date:</strong> <?php echo $event_date; ?></p>
          <p class="event-time">
            <strong>Time:</strong> <?php echo $event_time; ?>
            <?php if($event_connecting_text) : ?>
              <?php echo $event_connecting_text; ?>
            <?php endif; ?>
          </p>
          <p class="event-register-button"><a href="<?php echo $event_register_link ?>">Register Now</a></p>
        </div>
        <?php the_content(); ?>
      </div>    
    </div>
  </div>

<?php get_footer();?>