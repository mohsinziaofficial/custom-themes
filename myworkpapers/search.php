<?php get_header();

$title = get_the_title();

include('inc/scatter-img.php');

?>
<div class="PageBanner">
	<div class="container">
		<div class="PageBannerInner slide-in-left">
			<?php
				$s=get_search_query();
				$args = array(
						's' =>$s,
						'posts_per_page'      => -1,
							);
					// The Query
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {
						_e("<h1>Search Results for: ".get_query_var('s')."</h1>");
				 }
			?>
			<div class="PageBannerInnerContent">
				<p><?php echo $events_date ?></p>
				<?php if($events_start_time): ?> <p><?php echo $events_start_time." - ".$events_end_time; ?></p> <?php endif; ?>
			</div>
		</div>
		<?php include('inc/featuredImg.php'); ?>
	</div>
</div>
<div class="SpacingContent PageContentWrap ErrorPage">
	<div class="container">
		<?php
			$s=get_search_query();
			$args = array(
					's' =>$s,
					'posts_per_page'      => -1,
						);
				// The Query
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
					   $the_query->the_post();
							 ?>
		<ul>
		<li>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</li>
		<?php
			}
			?>
		</ul>
		<?php
			}else{
			?>
		<div class="alert alert-info">
			<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
		</div>
		<div class="NoFoundSearch">
			<?php get_search_form(); ?>
		</div>
		<?php } ?>
	</div>
</div>



<?php include('inc/contact.php'); ?>
<?php get_footer();?>