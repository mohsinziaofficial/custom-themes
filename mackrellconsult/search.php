<?php get_header();?>

<?php
  $bg = array('img/Page-Banner.jpg', 'img/Page-Banner-2.jpg', 'img/Page-Banner-3.jpg' );

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>
<div class="PageTitle">
	<div class="PageTitleInner" style="background-image: url('<?php bloginfo('template_directory'); ?>/<?php echo $selectedBg; ?>')">
		<div class="container">
			<h1>Search Results</h1>
			
		</div>
	</div>
</div>
<div id="contentArea">
	<div class="container">
		<div id="BreadcrumbsWrap">
			<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			} ?>
		</div>
		<div class="ContentWrap">
			<div class="ContentInner">
				<?php
					$s=get_search_query();
					$args = array(
							's' =>$s,
							'posts_per_page'      => -1,
								);
						// The Query
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) {
							_e("<h2 id='mainTitle'>Search Results for: ".get_query_var('s')."</h2><ul>");
							while ( $the_query->have_posts() ) {
							   $the_query->the_post();
									 ?>
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
				<h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
				<div class="alert alert-info">
					<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
				</div>
				<?php } ?>
			</div>
			<div class="Sidebar">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</div>
		</div>
	</div>
</div>


<?php
if (is_page('39')) {}
else { ?>
<div class="ChallengeUs">
	<div class="container">
		<h4>We Open Doors<span class="Gold">.</span></h4>
		<p>Well connected advisers can introduce you and your business to experts and new customers across the Middle East and Globally.</p>
		<a class="Button" href="/contact-us/">Challenge Us</a>
	</div>
</div>
  <?php } ?>









<?php get_footer();?>

