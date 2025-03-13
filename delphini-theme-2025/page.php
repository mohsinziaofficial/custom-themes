<?php get_header();?>
<div class="PageWrap MainWrap">
	<div class="container">
        <?php if ( get_field( 'page_highlight_title' ) ): ?>
            <div class="page-highlight-wrapper wpb_animate_when_almost_visible wpb_fadeIn fadeIn">
                <h1 class="page-highlight-title"><?php echo(the_field ( 'page_highlight_title' )) ?></h1>
            </div>
        <?php else: ?>
        <div class="page-highlight-wrapper wpb_animate_when_almost_visible wpb_fadeIn fadeIn">
                <h1 class="page-highlight-title"><?php the_title(); ?></h1>
            </div>
        <?php endif; ?>
		<?php the_content(); ?>
	</div>	
</div>	
<?php get_footer();?>