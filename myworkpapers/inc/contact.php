<?php $colors = get_field('page_settings_checkbox');
if( $colors && in_array('removefree', $colors) ) {} else { ?>

<div class="FooterForm">
	<div class="container">
		<div>
			<h2><span>Try for Free</span> – Power up your accounting practice with our proven, paperless working paper solution.</h2>
			<?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
		</div>
	</div>
</div>
<?php } ?>