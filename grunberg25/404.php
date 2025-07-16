<?php get_header();?>
<div class="PageWrap MainWrap">

	<div class="OpeningContent panel">
		<div class="container">
			<div class="TitleWrap">
				<?php if (function_exists('yoast_breadcrumb')): ?>
					<?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
				<?php endif; ?>

				<h1>Error 404: Page not found</h1>
			</div>
			<p>It seems we can’t find what you’re looking for. Perhaps searching can help.</p>
			<div class="NoFoundSearch">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer();?>


