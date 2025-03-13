<?php get_header();?>
<?php
	$s = get_search_query();
	$args = array(
		's' => $s,
		'posts_per_page' => -1,
	);
	$the_query = new WP_Query( $args );
?>
<div class="PageTitle">
	<div class="container">
		<?php
		if ( $the_query->have_posts() ) {
			_e("<h1 class='fade-in-bottom'>Search Results for: ".get_query_var('s')."</h1>");
		?>
		<?php }else{ ?>
			<h1 class='fade-in-bottom'>Nothing Found</h1>
		<?php } ?>
	</div>
</div>
<div class="SearchWrap MainWrap">
	<div class="container">
		<?php
			if ( $the_query->have_posts() ) {
		?>
		<ul>
			<?php
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
			?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</li>
			<?php }	?>
		</ul>
		<?php
			} else {
		?>
		<div class="alert alert-info">
			<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
			<div class="NoFoundSearch">
				<?php get_search_form(); ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php get_footer();?>