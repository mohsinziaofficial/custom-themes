<?php get_header();

$title = get_the_title();
$marketplace_sub_title = get_field('marketplace_sub_title');
$marketplace_content = get_field('marketplace_content');
$featureimg = get_the_post_thumbnail();

include('inc/scatter-img.php');
?>
<div class="PageBanner MarketplaceBanner">
	<div class="container">
		<div class="PageBannerInner slide-in-left">
			<h1><?php echo $title; ?></h1>
			<h2><?php echo $marketplace_sub_title; ?></h2>
		</div>
		<div class="MarketplaceImgWrap slide-in-left">
			<?php echo $featureimg; ?>
		</div>
	</div>
</div>
<div class="SpacingContent PageContentWrap">
	<div class="container fade-bottom reveal">
		<?php echo $marketplace_content; ?>
		<div class="Introduction">
			<h3>Request an introducton</h3>
			<?php echo do_shortcode('[gravityform id="8" title="false" description="false"]'); ?>
		</div>
	</div>
</div>



<?php include('inc/contact.php'); ?>
<?php get_footer();?>