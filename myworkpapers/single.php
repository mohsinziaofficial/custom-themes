<?php get_header();

$title = get_the_title();

include('inc/scatter-img.php');

?>
<div class="PageBanner">
	<div class="container">
		<div class="PageBannerInner slide-in-left">
			<h1><?php echo $title; ?></h1>
			<div class="PageBannerInnerContent">
				<p><?php echo $events_date ?></p>
				<?php if($events_start_time): ?> <p><?php echo $events_start_time." - ".$events_end_time; ?></p> <?php endif; ?>
			</div>
		</div>
		<?php include('inc/featuredImg.php'); ?>
	</div>
</div>
<div class="SpacingContent PageContentWrap">
	<div class="container fade-bottom reveal">
		<?php the_content(); ?>
		<div class="Share">
			<?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
		</div>
	</div>
</div>



<?php include('inc/contact.php'); ?>
<?php get_footer();?>