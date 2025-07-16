<?php get_header();
$job_title = get_field('job_title');
$email = get_field('email');
$direct_telephone = get_field('direct_telephone');
$tel = get_field('tel');
$qualification = get_field('qualification');
$alt_image = get_field('alternative_image');
?>
<div class="TeamWrap MainWrap">
	<div class="OpeningContent">
		<div class="container">
			<div class="TitleWrap">
				<?php if (function_exists('yoast_breadcrumb')): ?>
					<?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
				<?php endif; ?>

				<h1 class="profile-name"><?php the_title(); ?>&nbsp;<?php if ($qualification) echo $qualification; ?></h1>
				<h2>
					<span class="wipe orange-wipe">
						<?php if ($job_title) echo $job_title; ?>
					</span>
				</h2>
				<?php if ($email || $direct_telephone || $tel): ?>
					<p class="TeamContact">
						<?php if ($email): ?>
							Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
						<?php endif; ?>

						<?php if ($direct_telephone): ?>
							<?php if ($email) echo ' | '; ?>
							Direct Dial: <a href="tel:<?php echo $direct_telephone; ?>"><?php echo $direct_telephone; ?></a>
						<?php endif; ?>

						<?php if ($tel): ?>
							<?php if ($email || $direct_telephone) echo ' | '; ?>
							Tel: <a href="tel:<?php echo $tel; ?>"><?php echo $tel; ?></a>
						<?php endif; ?>
					</p>
				<?php endif; ?>


			</div>
		</div>
	</div>
	<div class="ProfileContent">
		<div class="container">
			<div class="ProfileContent">
				<?php the_content(); ?>
			</div>
			<div class="Profileshot">
				<div class="Profileimg">
					<?php if ($alt_image) : ?>
						<img src="<?php echo esc_url($alt_image); ?>" alt="<?php the_title(); ?>">
					<?php elseif (has_post_thumbnail()) : ?>
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
					<?php endif; ?>
				</div>
				<div class="ProfileSocials">
					<?php
					// Get the group field
					$social_links = get_field('social_links');

					if ($social_links) :
						// LinkedIn
						if (!empty($social_links['linkedin'])) : ?>
							<a href="<?php echo esc_url($social_links['linkedin']); ?>" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin-in"></i></a>
						<?php endif;

						// Facebook
						if (!empty($social_links['facebook'])) : ?>
							<a href="<?php echo esc_url($social_links['facebook']); ?>" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f"></i></a>
						<?php endif;

						// Twitter/X
						if (!empty($social_links['twitter__x'])) : ?>
							<a href="<?php echo esc_url($social_links['twitter__x']); ?>" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-x-twitter"></i></a>
					<?php endif;
					endif;
					?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>