<?php
// Custom query to order events by start_date_and_time
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$args = array(
	'post_type' => 'event',
	'posts_per_page' => -1,
	'paged' => $paged,
	'meta_key' => 'start_date_and_time',
	'orderby' => 'meta_value',
	'order' => 'ASC',
);

$events_query = new WP_Query( $args );
?>

<?php get_header(); ?>
<div class="ArchiveWrap MainWrap">
	<div class="OpeningContent">
		<div class="container">
			<div class="TitleWrap">
				<?php if (function_exists('yoast_breadcrumb')): ?>
					<?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
				<?php endif; ?>

				<h1><?php post_type_archive_title(); ?></h1>
			</div>
		</div>
	</div>

	<div class="ArchiveItemWrap">
		<div class="container">
			<?php if ( $events_query->have_posts() ) : ?>
				<div class="event-loop">
					<!-- Start of the main loop -->
					<?php while ( $events_query->have_posts() ) : $events_query->the_post(); ?>
						<article <?php post_class(array('archive-post')) ?>>
							<h3>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
							
							<?php
							$start_date = get_field('start_date_and_time');
							$end_date = get_field('end_date_and_time');

							if ( $start_date && $end_date ) {
								// Convert start and end to DateTime for comparison
								$start_datetime = DateTime::createFromFormat( 'F j, Y g:i a', $start_date );
								$end_datetime   = DateTime::createFromFormat( 'F j, Y g:i a', $end_date );

								if ( $start_datetime && $end_datetime ) {
									// Compare the dates (Y-m-d)
									if ( $start_datetime->format('Y-m-d') === $end_datetime->format('Y-m-d') ) {
										// Same day — show: "June 20, 2025, 10:00 am - 12:00 pm"
										echo '<p class="ArticleDate">' . esc_html( $start_datetime->format('F j, Y') ) . ', ';
										echo esc_html( $start_datetime->format('g:i a') ) . ' - ' . esc_html( $end_datetime->format('g:i a') ) . '</p>';
									} else {
										// Different days — show full start and end
										echo '<p class="ArticleDate">' . esc_html( $start_date ) . ' - ' . esc_html( $end_date ) . '</p>';
									}
								}
							} elseif ( $start_date ) {
								// Only start date present
								echo '<p class="ArticleDate">' . esc_html( $start_date ) . '</p>';
							}
							?>


							<p>
								<?php
								$excerpt = get_the_excerpt();
								echo wp_trim_words( $excerpt, 20, '...' );
								?>
							</p>

							<a class="Button" href="<?php the_permalink(); ?>">Find out more</a>
						</article>
					<?php endwhile; ?>
					<!-- End of the main loop -->
				</div>


			<?php else : ?>
				<p><?php _e('Sorry, there are currently no events.', 'txtdomain'); ?></p>
			<?php endif; ?>

			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
