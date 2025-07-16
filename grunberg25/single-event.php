<?php get_header(); ?>
<div class="PostWrap EventPost MainWrap">
	<div class="OpeningContent">
		<div class="container">
			<div class="TitleWrap">
				<?php if (function_exists('yoast_breadcrumb')): ?>
					<?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
				<?php endif; ?>

				<h1><?php the_title(); ?></h1>

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
				<?php $register_link = get_field('register_link'); ?>
				<a class="Button" href="<?php echo $register_link; ?>">Register Now</a>
			</div>
		</div>
	</div>

	<div class="PostContent">
		<div class="container">
			<?php the_content(); ?>
			<a class="Button" href="<?php echo $register_link; ?>">Register Now</a>
		</div>
	</div>
</div>
<?php get_footer(); ?>
