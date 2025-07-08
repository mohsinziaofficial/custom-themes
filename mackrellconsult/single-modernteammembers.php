<?php get_header();?>

<?php
  $bg = array('img/Page-Banner.jpg', 'img/Page-Banner-2.jpg', 'img/Page-Banner-3.jpg' );

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>
<div class="PageTitle">
	<div class="PageTitleInner" style="background-image: url('<?php bloginfo('template_directory'); ?>/<?php echo $selectedBg; ?>')">
		<div class="container">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</div>
<div class="container <?php the_field('page_padding_bottom_remover'); ?>">
    <div id="pagecontent">
		<div id="contentArea">
			<div class="container">
				<div id="BreadcrumbsWrap">
					<?php if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					} ?>
				</div>
				<div class="ContentWrap TeamWrap">
					<div class="ContentInner">
						<div class="ProfileOuter">
							<div class="ProfileWrap">	
								<div class="ProfilePhoto">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="ProfileDetails">
									<h1><?php the_title(); ?></h1>
									<h4>
									<?php echo get_post_meta($post->ID, 'MTS Job Title', true); ?><?php // echo get_post_meta($post->ID, 'MTS Location', true); ?></h2>
									<ul>
										<li><i class="fa fa-envelope"></i> <a href="mailto:<?php echo get_post_meta($post->ID, 'MTS E-mail', true); ?>"><?php echo get_post_meta($post->ID, 'MTS E-mail', true); ?></a></li>
										<?php $mood = get_post_meta($post->ID, 'MTS Telephone', true);
											if ($mood) { ?>
										<li><i class="fa fa-phone"></i> <a href="tel: <? echo $mood; ?>"><? echo $mood; ?></a></li>
										<?php } else { // do nothing;
											} ?>
										<?php $mood = get_post_meta($post->ID, 'MTS DDI', true);
											if ($mood) { ?>
										<li><i class="fa fa-phone"></i> <a href="tel: <? echo $mood; ?>"><? echo $mood; ?></a></li>
										<?php } else { // do nothing;
											} ?>
										<?php $mood = get_post_meta($post->ID, 'MTS Mobile', true);
											if ($mood) { ?>
										<li><i class="fa fa-mobile"></i> <a href="tel: <? echo $mood; ?>"><? echo $mood; ?></a></li>
										<?php } else { // do nothing;
											} ?>
										<?php  $mood = get_post_meta($post->ID, 'MTS Skype', true);
											if ($mood) { ?>
										<li><i class="fa fa-skype"></i> <a href="<? echo 'skype:'.$mood.'?chat'; ?>" target="_blank">Contact me on Skype</a></li>
										<?php } else { // do nothing;
											} ?>
										<?php $mood = get_post_meta($post->ID, 'MTS LinkedIn', true);
											if ($mood) { ?>
										<li><i class="fa fa-linkedin"></i> <a href="<? echo $mood; ?>" target="_blank">Connect with me on LinkedIn</a></li>
										<?php } else { // do nothing;
											} ?>
										<?php $mood = get_post_meta($post->ID, 'MTS Twitter', true);
											if ($mood) { ?>
										<li><i class="fa fa-twitter"></i><a href="<? echo $mood; ?>" target="_blank">Connect with me on Twitter</a></li>
										<?php } else { // do nothing;
											} ?>
									</ul>
								</div>

							</div>
							<div class="ProfileContent">
								<?php the_content(); ?>            
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
    </div>
</div>
<?php get_footer();?>

