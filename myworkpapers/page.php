<?php get_header();

$title = get_the_title();
$disable_max_width = get_field('disable_max_width');

include('inc/scatter-img.php');
?>

<div class="PageBanner">
	<div class="container">
		<div class="PageBannerInner slide-in-left <?php if( $disable_max_width && in_array('disable_max_width', $disable_max_width) ) { echo "disable_max_width"; }?>">
			<h1>
				<?php if(get_field('default_page_banner_title')){
					echo the_field('default_page_banner_title');
				} else { 
					echo $title;
				}; ?>
			</h1>
			<div class="PageBannerInnerContent">
				<?php the_field('default_page_banner_content'); ?>
			</div>
		</div>
		<?php include('inc/featuredImg.php'); ?>
	</div>
</div>
<div class="DeafultPageContentWrap PageContentWrap">
	<div class="container">
		<?php the_content(); ?>
	</div>
</div>


<?php include('inc/contact.php'); ?>
<?php get_footer();?>