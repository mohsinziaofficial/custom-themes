<?php
/* Template Name: Webinars */
get_header();

$bg = array(
	'/wp-content/uploads/2023/10/MWP-Scatter-Icons.png',
	'/wp-content/uploads/2023/10/MWP-Scatter-Icons-2.png',
	'/wp-content/uploads/2023/10/MWP-Scatter-Icons-3.png',
	'/wp-content/uploads/2023/10/MWP-Scatter-Icons-4.png',
	'/wp-content/uploads/2023/10/MWP-Scatter-Icons-5.png',
);

$i = rand(0, count($bg)-1); // generate random number size of the array
$selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen

$title = get_the_title();
$disable_max_width = get_field('disable_max_width');
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
<div class="WebinarPageConetnt PageContentWrap">
	<div class="container">
		<?php the_content(); ?>
	</div>
</div>
<div class="WebinarPageWrap PageContentWrap ">
	<div class="container">
		<?php
		$webinars_category_selector = get_field('webinars_category_selector');
		$the_query = new WP_Query( array(
			'posts_per_page'=> 9,
			'post_type'=>'events',
			// The below sets which category to pull in based on selected from ACF
			'tax_query' => array(
			  array(
				'taxonomy' => 'events_cat',
				'field' => 'term_id', // not needed, default value
				'terms' => array( $webinars_category_selector ),
			  )
			),
			// The below orders the events and webinars by the ACF field of events_date
			'meta_query'        => array(
				'key'       => 'events_date',
				'value'     => date('Ymd'),
				'type'      => 'DATE',
				'compare'   => '>='
			),
			'meta_key'  => 'events_date',
			'orderby' => array( 'meta_value' => 'ASC' ), 
			'paged' => get_query_var('paged') ? get_query_var('paged') : 1) 
		);
		
		
		
		?>
		<div class="WebinarWrap">
			
			<?php while ($the_query -> have_posts()) : $the_query -> the_post();
				$events_date = get_field('events_date', $post->ID);
				$events_end_date = get_field('events_end_date', $post->ID);
				$events_start_time = get_field('events_start_time', $post->ID);
				$events_end_time = get_field('events_end_time', $post->ID);
				$post_id = get_the_ID();
			?>
				<div class="WebinarInnerWrap" id="Event<?php echo $post_id; ?>">
					<p class="WebinarDate">
						<?php if($events_date): echo $events_date; endif; ?>
						<?php if($events_end_date): ?> - <?php echo $events_end_date; endif;?><br>
						<?php if($events_start_time): echo $events_start_time; endif; if($events_end_time): echo " - ".$events_end_time; endif; ?>
					</p>
					<hr>
					<div class="InnerWebinar">
						<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						<p class="WebinarExcerpt"><?php echo excerpt(30); ?></p>
						<a class="Button" href="<?php the_permalink() ?>">Find out more</a>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<?php
			$big = 999999999; // need an unlikely integer
			$pageLink = paginate_links( array(
				'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $the_query->max_num_pages
			) );
		?>
		<?php if($pageLink){ ?>
			<div class="nav-pagination">
				<div class="navigation pagination">
					<div class="nav-links">
						<?php echo $pageLink; ?>
					</div>
				</div>
			</div>
		<?php }else{} ?>	
		<?php
			wp_reset_postdata();
		?>
	</div>
</div>



<?php include('inc/contact.php'); ?>
<?php get_footer();?>