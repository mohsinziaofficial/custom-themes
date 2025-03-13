<?php get_header();

$title = get_the_title();
$events_date = get_field('events_date');
$events_end_date = get_field('events_end_date');
$events_start_time = get_field('events_start_time');
$events_end_time = get_field('events_end_time');
$events_register_link = get_field('events_register_link');
$events_duration = get_field('events_duration');
$events_prerequisites = get_field('events_prerequisites');
$events_delivery_method = get_field('events_delivery_method');
$featureimg = get_the_post_thumbnail();

include('inc/scatter-img.php');
?>
<div class="PageBanner">
	<div class="container">
		<div class="PageBannerInner slide-in-left">
			<h1><?php echo $title; ?></h1>
			<div class="PageBannerInnerContent">
				<?php if($events_date): ?>
				<p class="EventDateBanner"><img src="<?php bloginfo('template_directory'); ?>/img/calendar-days-solid.svg" alt="Calendar Icon"><?php echo $events_date ?><?php if($events_end_date): ?> - <?php echo $events_end_date; endif;?></p>
				<?php endif; ?>
				<?php if($events_start_time): ?>
					<p class="EventTimeBanner"><img src="<?php bloginfo('template_directory'); ?>/img/clock-solid.svg" alt="Clock Icon"><?php echo $events_start_time; endif; ?>
						<?php if($events_end_time): ?> - <?php echo $events_end_time; ?></p>
				<?php endif; ?>
				<?php if($events_duration): ?>
					<p class="EventTimeBanner"><img src="<?php bloginfo('template_directory'); ?>/img/clock-solid.svg" alt="Clock Icon"><?php echo $events_duration; ?> Mins</p>
				<?php endif; ?>
				<a href="<?php echo $events_register_link; ?>" class="Button" target="_blank">Register now</a>
			</div>
		</div>
		<?php include('inc/featuredImg.php'); ?>
	</div>
</div>
<div class="SpacingContent PageContentWrap">
	<div class="container">
		<div class="EventSContent">
			<div class="EventSColumn1 fade-bottom reveal">
				<div class="StickyImg">
					<div class="EventImgWrap"><?php echo $featureimg; ?></div>
				</div>
			</div>
			<div class="EventSColumn2 fade-bottom reveal">
				<?php if($events_prerequisites): ?>
					<p>Pre-requisites: <?php echo $events_prerequisites; ?></p>
				<?php endif; ?>
				<?php if($events_delivery_method): ?>
					<p>Delivery Method: <?php echo $events_delivery_method; ?></p>
				<?php endif; ?>
				<?php the_content(); ?>
				<a href="<?php echo $events_register_link; ?>" class="Button" target="_blank">Register now</a>
			</div>
		</div>
	</div>
</div>



<?php include('inc/contact.php'); ?>
<?php get_footer();?>