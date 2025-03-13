<?php get_header();?>
<div class="HomeBanner">
	<div class="container">
		<div class="HomeBannerInner slide-in-left">
			<h1>Working papers for a Cloud-First World </h1>
			<p>Enhance your accountancy, tax and audit processes by using MyWorkpapers’ cloud-first, paperless working papers for accountants and auditors.</p>
			<ul>
				<li><i class="fa-solid fa-check"></i> Centralise</li>
				<li><i class="fa-solid fa-check"></i> Simplify</li>
				<li><i class="fa-solid fa-check"></i> Standardise</li>
			</ul>
			<a href="/uk/free-trial/" class="Button">Start your Free Trial</a> <a href="/uk/request-a-demo/" class="Button">Request a Demo</a>
		</div>
	</div>
</div>
<div class="FeaturedBoxes">
	<div class="container">
		<div class="FeaturedBoxesWrap fade-bottom reveal active">	
			<?php

				// Check rows existexists.
				if( have_rows('highlight_carousel') ):

					// Loop through rows.
					while( have_rows('highlight_carousel') ) : the_row();

						// Load sub field value.
						$icon = get_sub_field('icon');
						$title = get_sub_field('title');
						$content = get_sub_field('content');
			?>
			<div class="FeaturedItem">
				<div class="FeaturedItemInner">
					<div class="FeaturedItemImg">
						<div>
							<img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>">
							<p><?php echo $title; ?></p>
						</div>
					</div>
					<div class="FeaturedItemText">
						<p><?php echo $content; ?></p>
					</div>
				</div>
			</div>
			<?php
					// End loop.
					endwhile;

				// No value.
				else :
					// Do something...
				endif;
			?>
		</div>
	</div>
</div>
<div class="QuoteArea">
	<div class="container">
		<div class="fade-bottom reveal active">
			<p><span class="QuoteStart"><i class="fa-solid fa-quote-left"></i></span> We are eliminating admin, enhancing visibility, streamlining workflows and standardising approaches to transform the way that accounting firms work in the cloud. <span class="QuoteEnd"><i class="fa-solid fa-quote-right"></i></span></p>
			<a href="/uk/free-trial/" class="Button">Get Started</a>
		</div>
	</div>
</div>
<div class="Platform">
	<h2 class="fade-bottom reveal active">Seamless Integration</h2>
	<div class="PlatformWrap fade-bottom reveal active">
		<div class="PlatformSlide PlatformTop">
			<?php
				
				$args = array(
					'post_type' => 'integration',
					'posts_per_page' => '-1',
				);
				$products_loop = new WP_Query( $args );
				if ( $products_loop->have_posts() ) :
					$count = 0;
					while ( $products_loop->have_posts() ) : $products_loop->the_post();
						// Set variables
						$count++;
						$integration_home_slider_icon = get_field('integration_home_slider_icon');
						if($count % 2 == 0): //even
			?>	
			<div class="PlatformItemWrap">
				<div class="PlatformItem">
					<div class="PlatformImg">
						<img src="<?php echo $integration_home_slider_icon; ?>" alt="<?php echo $seamless_title; ?>">
					</div>
					<div class="PlatformContent">
						<div>
							<p class="PlatformTitle"><?php the_title(); ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php
						endif;
						endwhile;
					wp_reset_postdata();
				endif;
			?>
			
			
		</div>
		<div class="PlatformSlide PlatformBottom">
		<?php
				$args = array(
					'post_type' => 'integration',
					'posts_per_page' => '-1',
				);
				$products_loop = new WP_Query( $args );
				if ( $products_loop->have_posts() ) :
				$count = 0;
					while ( $products_loop->have_posts() ) : $products_loop->the_post();
						// Set variables
						$count++;
						$integration_home_slider_icon = get_field('integration_home_slider_icon');
						if($count % 2 == 0): //even
						else :
			?>	
			<div class="PlatformItemWrap">
				<div class="PlatformItem">
					<div class="PlatformImg">
						<img src="<?php echo $integration_home_slider_icon; ?>" alt="<?php echo $seamless_title; ?>">
					</div>
					<div class="PlatformContent">
						<div>
							<p class="PlatformTitle"><?php the_title(); ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php
							endif;
						endwhile;
					wp_reset_postdata();
				endif;
			?>
			
		</div>
	</div>
	<div class="container PlatformSignoff fade-bottom reveal active">
		<p>Join the 10,000+ accountants, auditors and advisers using our software already.</p>
	</div>
</div>
<div class="Testimonial fade-bottom reveal active">
	<div class="container">
		<h2>This is what being cloud-first feels like: </h2>
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
						<p><span><i class="fa-solid fa-quote-left"></i><?php echo $testimonials_content; ?><i class="fa-solid fa-quote-right"></i></span></p>
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
<?php include('inc/contact.php'); ?>
<?php get_footer();?>