<?php get_header();?>
<div class="PageWrap MainWrap">
	<div class="container">
		<?php the_content(); ?>
		
	</div>

	<div class="SlidesBackground">
		<div class="container SliderWrap">
			<div class="titlebox">
				<div class="title">Insights</div>
			</div>
			<div class="SliderInner">
			<?php
				$query = new WP_Query(
					array(
						'category_in' => array(6),
						'posts_per_page' => '6',
						'post_type' => 'post',
					)
				);
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
					$query->the_post();

					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			?>
				<div class="SlideContent">
					<article>
						<a href="<?php the_permalink();?>">
							<div class="FeatureImage" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
							<div class="SlideArticle">
								<h4><?php the_title(); ?></h4>
								<p class="ArticleDate"><?php echo get_the_date('j F Y'); ?></p>
								<p><?php echo excerpt(20); ?></p>
							</div>
						</a>
					</article>	
				</div>
				
			<?php
					}
				}
				wp_reset_postdata();
			?>
		</div>
		</div>
	</div>
	
	<div class="Testimonial fade-bottom reveal active">
	<div class="container">
		<div class="TestimonialWrap">
			<div class="TestimonialInner">
				<?php
					$args = array(
						'post_type' => 'testimonial',
						'posts_per_page' => '5',
						'orderby' => 'rand',
					);
					$products_loop = new WP_Query( $args );
					if ( $products_loop->have_posts() ) :
						while ( $products_loop->have_posts() ) : $products_loop->the_post();
							// Set variables
							$testimonials_name = get_field('testimonials_name');
							$testimonials_content = get_field('testimonials_content');
				?>
				<div class="TestimonialItem">
					<div class="TestimonialContent">
						<p>&quot;<?php echo $testimonials_content; ?>&quot;</p>
					</div>
					<p class="TestimonialName"><?php echo $testimonials_name; ?></p>
				</div>
				<?php
						endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</div>
	</div>
</div>

</div>
<?php get_footer();?>