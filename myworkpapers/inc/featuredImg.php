<?php if($disable_max_width): else : ?>
	<div class="pageScatterImage fade-in">
		<?php if (get_post_type() === 'events'): else : ?>
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			else { ?>
				<img src="<?php echo $selectedBg; ?>">
			<?php } ?>
		<?php endif; ?>
	</div>

<?php endif; ?>