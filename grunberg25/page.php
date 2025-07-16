<?php get_header(); ?>

<div class="PageWrap MainWrap">

	<div class="OpeningContent panel">
		<div class="container">
			<div class="TitleWrap">
				<?php if (function_exists('yoast_breadcrumb')): ?>
					<?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
				<?php endif; ?>

				<h1><?php the_title(); ?></h1>
			</div>
			<?php the_content(); ?>
		</div>
	</div>

	<?php if (have_rows('panels')): ?>
		<?php while (have_rows('panels')): the_row(); ?>
			<?php
			$panel_color_class = get_sub_field('panel_colour');
			?>

			<?php if (have_rows('panel_content_area')): ?>
				<div class="panel <?php echo esc_attr($panel_color_class); ?>">
					<div class="container">
						<?php while (have_rows('panel_content_area')): the_row(); ?>

							<?php if (get_row_layout() === 'full_width'): ?>
								<?php the_sub_field('content'); ?>

							<?php elseif (get_row_layout() === 'one_third_two_thirds'): ?>
								<div class="grid grid-1-2">
									<div class="column">
										<?php the_sub_field('left_column'); ?>
									</div>
									<div class="column">
										<?php the_sub_field('right_column'); ?>
									</div>
								</div>

							<?php elseif (get_row_layout() === 'two_columns'): ?>
								<div class="grid grid-1-1">
									<div class="column">
										<?php the_sub_field('column_1'); ?>
									</div>
									<div class="column">
										<?php the_sub_field('column_2'); ?>
									</div>
								</div>

							<?php elseif (get_row_layout() === 'three_columns'): ?>
								<div class="grid grid-1-1-1">
									<div class="column">
										<?php the_sub_field('column_1'); ?>
									</div>
									<div class="column">
										<?php the_sub_field('column_2'); ?>
									</div>
									<div class="column">
										<?php the_sub_field('column_3'); ?>
									</div>
								</div>

							<?php elseif (get_row_layout() === 'four_columns'): ?>
								<div class="grid grid-1-1-1-1">
									<div class="column">
										<?php the_sub_field('column_1'); ?>
									</div>
									<div class="column">
										<?php the_sub_field('column_2'); ?>
									</div>
									<div class="column">
										<?php the_sub_field('column_3'); ?>
									</div>
									<div class="column">
										<?php the_sub_field('column_4'); ?>
									</div>
								</div>

							<?php elseif (get_row_layout() === 'one_quarter_three_quarters'): ?>
								<div class="grid grid-1-3">
									<div class="column column-25">
										<?php the_sub_field('one_quarter'); ?>
									</div>
									<div class="column column-75">
										<?php the_sub_field('three_quarters'); ?>
									</div>
								</div>

							<?php endif; ?>

						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>

	<!-- <?php if (is_page(33875)) : ?>
		<div class="panel">
			<div class="carousel-container">
				<div class="carousel-slide active"><img src="https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/07/office-image-1.webp" alt="Image 1"></div>
				<div class="carousel-slide"><img src="https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/07/office-image-2.webp" alt="Image 2"></div>
				<div class="carousel-slide"><img src="https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/07/office-image-3.webp" alt="Image 3"></div>
				<div class="carousel-slide"><img src="https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/07/office-image-4.webp" alt="Image 4"></div>
			</div>
		</div>
	<?php endif; ?> -->
	<?php
	$team_members = get_field('meet_the_team');

	if ($team_members): ?>
		<div class="PageTeam GridBox panel">
			<div class="container">
				<h3>Meet the <span class="wipe orange-wipe">team</span></h3>
				<div class="team-members">
					<?php foreach ($team_members as $member): ?>
						<?php
						setup_postdata($member);

						$job_title = get_field('job_title', $member->ID);
						$email     = get_field('email', $member->ID);
						$tel       = get_field('tel', $member->ID);
						$image_url = get_the_post_thumbnail_url($member->ID, 'medium');
						$post_link = get_permalink($member->ID);
						?>

						<div class="team-member">
							<?php if ($image_url): ?>
								<a href="<?php echo esc_url($post_link); ?>">
									<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title($member->ID)); ?>">
								</a>
							<?php endif; ?>

							<h3>
								<a href="<?php echo esc_url($post_link); ?>">
									<?php echo esc_html(get_the_title($member->ID)); ?>
								</a>
							</h3>

							<?php if ($job_title): ?>
								<p class="JobRole"><?php echo esc_html($job_title); ?></p>
							<?php endif; ?>

							<?php if ($email): ?>
								<p class="Teamemail"><a href="mailto:<?php echo antispambot($email); ?>"><?php echo antispambot($email); ?></a></p>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>


	<?php if (have_rows('guides')): ?>
		<div class="PageGuides GridBox panel">
			<div class="container">
				<h3>Guides</h3>
				<div class="GuideWrap">
					<?php while (have_rows('guides')): the_row();
						$guide_title = get_sub_field('guide_title');
						$guide_url   = get_sub_field('guide_url');
					?>
						<div class="GuideItem">
							<a href="<?php echo esc_url($guide_url); ?>" target="_blank"><?php echo esc_html($guide_title); ?><span class="DownloadIcon"><i class="fa-solid fa-file-arrow-down"></i></span></a>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php
	global $post;

	// Get the front page ID to exclude it from results
	$front_page_id = get_option('page_on_front');

	// Try to get direct child pages first
	$related_pages = get_pages([
		'parent'      => $post->ID,
		'exclude'     => $front_page_id,
		'sort_column' => 'menu_order',
		'sort_order'  => 'ASC'
	]);

	// If no children, get sibling pages instead
	if (empty($related_pages) && $post->post_parent) {
		$related_pages = get_pages([
			'parent'      => $post->post_parent,
			'exclude'     => implode(',', [$post->ID, $front_page_id]),
			'sort_column' => 'menu_order',
			'sort_order'  => 'ASC'
		]);
	}

	// Only show the whole section if we have related pages
	if (!empty($related_pages)): ?>
		<div class="PageRelatedLinks GridBox panel">
			<div class="container">
				<h3>Related <span class="wipe blue-wipe">link<?php echo (count($related_pages) > 1) ? 's' : ''; ?></span></h3>
				<ul class="related-links">
					<?php foreach ($related_pages as $page): ?>
						<li><a href="<?php echo get_permalink($page->ID); ?>"><?php echo esc_html($page->post_title); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>




</div>

<?php get_footer(); ?>