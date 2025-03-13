<?php

// Start of Marketplace Shortcode
function marketplace($atts) {
    ob_start(); ?>
<div class="MarketPlaceWrap">
<?php
	$marketplaceCatTarget = array(
        'link' => '#',
    );
	$a = shortcode_atts($marketplaceCatTarget, $atts);
	
    $args = array(
		'post_type' => 'marketplace',
		'posts_per_page' => -1,
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'tax_query' => array(
            array(
                'taxonomy' => 'marketplace_cat',
                'field' => 'slug',
                'terms' => $a['link'],
            )
        )
	);
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
	
	$marketplace_intro_text = get_field('marketplace_intro_text');
	$mplogo = get_the_post_thumbnail_url();
	$marketplace_logo_width = get_field('marketplace_logo_width');
	$marketplace_remove_link = get_field('marketplace_remove_link');
?>

	<div class="MarketPlaceInner">
		<?php if( $marketplace_remove_link && in_array('marketplace_remove_link', $marketplace_remove_link) ) : else : ?><a href="<?php the_permalink(); ?>"><?php endif; ?>
			<div class="MPImage">
				<img src="<?php echo $mplogo; ?>" alt="<?php the_title(); ?>" <?php if($marketplace_logo_width): ?> style="max-width: <?php echo $marketplace_logo_width; ?>px"<?php endif; ?> >
			</div>
			<div class="MPText">
				<h3><?php the_title(); ?></h3>
				<?php if($marketplace_intro_text): ?><p><?php echo $marketplace_intro_text; ?></p><?php endif; ?>
			</div>
		<?php if( $marketplace_remove_link && in_array('marketplace_remove_link', $marketplace_remove_link) ) : else : ?></a><?php endif; ?>
	</div>

	

            
        

<?php endwhile; ?>
</div>
<?php
    return ob_get_clean();
}

add_shortcode('marketplace', 'marketplace');
// End of Marketplace Shortcode



// Start of Download Shortcode
function download($dwn) {
    ob_start(); ?>
<div class="DownloadWrap Divided-List Li-links">
	<ul class="Download ">
<?php
	$downloadCatTarget = array(
        'link' => '#',
    );
	$b = shortcode_atts($downloadCatTarget, $dwn);
	
    $args = array(
		'post_type' => 'downloads',
		'posts_per_page' => -1,
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'tax_query' => array(
            array(
                'taxonomy' => 'downloads_cat',
                'field' => 'slug',
                'terms' => $b['link'],
            )
        )
	);
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
	
	$download_link = get_field('download_link');
?>
	
		<li><a href="<?php echo $download_link; ?>" target="_blank"><?php the_title(); ?></a></li>
	

<?php endwhile; ?>
	</ul>
</div>
<?php
    return ob_get_clean();
}

add_shortcode('download', 'download');
// End of Download Shortcode




// Start of integrations Shortcode
function integrations($inter) {
    ob_start(); ?>
<div class="IntegrationPageWrap">
	<ul class="integrationUL">
<?php
//	$downloadCatTarget = array(
//        'link' => '#',
//    );
//	$b = shortcode_atts($downloadCatTarget, $inter);
	
    $args = array(
		'post_type' => 'integration',
		'posts_per_page' => -1,
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
	);
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
	
	$integration_home_slider_icon = get_field('integration_home_slider_icon');
?>
	
	
		<li>
			<div class="IntegrationInnerWrap">
				<div class="IntegrationImg">
					<img src="<?php echo $integration_home_slider_icon; ?>" alt="<?php the_title(); ?>">
				</div>
				<div class="IntegrationTitle">
					<p><?php the_title(); ?></p>
				</div>
			</div>
		</li>
	

<?php endwhile; ?>
	</ul>
</div>
<?php
    return ob_get_clean();
}

add_shortcode('integrations', 'integrations');
// End of integrations Shortcode
?>