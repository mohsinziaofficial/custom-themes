<?php
  /**
   * Template Name: Events Page
   */

  get_header();

?>

<div class="PageWrap">
  <div class="container">
    <div class="breadcrumbs-wrap">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
              yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
         } ?>
    </div>
    <h1 class="page-heading"><?php the_title(); ?></h1>
  </div>
  <div id="PageContentWrap" class="ArchiveWrap EventsPage">
    <div class="container">
      <?php
      // Query Events (No meta_key for ordering)
      $events_query = new WP_Query([
        'post_type' => 'events',
        'posts_per_page' => 10, // Adjust as needed
        'orderby' => 'date', // Order by post date (default order)
        'order' => 'ASC', // Ascending order
      ]);

      if ($events_query->have_posts()) : ?>
      <div class="archive-loop">
        <?php
          while ($events_query->have_posts()) : $events_query->the_post();
          $event_type = get_field('event_type');
          $event_venue = get_field('event_venue');
          $event_date = get_field('event_date');
          $event_time = get_field('event_time');
        ?>
        <article <?php post_class(array('event-item')) ?>>
          <a href="<?php the_permalink() ?>">
            <div class="eventContentWrap">
              <p class="event-type"><?php echo $event_type; ?></p>
              <p class="event-venue"><strong>Venue:</strong> <?php echo $event_venue; ?></p>
              <p class="event-date"><strong>Date:</strong> <?php echo $event_date; ?></p>
              <p class="event-time"><strong>Time:</strong> <?php echo $event_time; ?></p>
              <h3 class="event-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
    <!--
              <div class="excerpt">
                <?php //the_excerpt() ?>
              </div>
    -->
            </div>
          </a>
        </article>
        <?php endwhile; ?>
      </div>
      <div class="nav-pagination"><?php the_posts_pagination(); ?></div>
      <?php else : ?>
        <p>There are currently no events taking place. Please check back later.</p>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
