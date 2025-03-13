<?php get_header();

$title = get_the_title();

include('inc/scatter-img.php');

?>
<div class="PageBanner">
	<div class="container">
		<div class="PageBannerInner slide-in-left">
			<h1>Page not found</h1>
			<div class="PageBannerInnerContent">
				<p>Sorry the page you're looking for doesn't exist. I fyou think something is broken, please contact us.</p>
				<a href="/" class="Button">Return Home</a> <a href="/contact-us/" class="Button">Report Problem</a>
			</div>
		</div>
		<?php include('inc/featuredImg.php'); ?>
	</div>
</div>




<?php include('inc/contact.php'); ?>
<?php get_footer();?>