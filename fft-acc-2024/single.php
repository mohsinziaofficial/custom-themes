<?php
  $feature_img = get_the_post_thumbnail_url();
  if( empty($feature_img) ) {
    $feature_img = "/wp-content/uploads/2024/09/Bees-2282212015-landscape.png";
  }
  $category = get_the_category();
  $cat_name = $category[0]->cat_name;

  get_header();
?>

<div class="inner-page-top">
  <div class="container">
    <h1 class="title"><?php echo $cat_name; ?></h1>
    <img class="img-top" src="/wp-content/uploads/2024/08/cubes-bottom-right-2.png" >
  </div>
</div>

<div class="PostTitle">
	<div class="container">
    <div class="breadcrumbs-wrap">
      <?php if(function_exists('yoast_breadcrumb')) {
          yoast_breadcrumb('<span id="breadcrumbs">','</span>');
        }
      ?>
    </div>
		<h1><?php the_title(); ?></h1>
    <?php if ($cat_name != 'Careers') { ?>
    <p><?php the_date(); ?></p>
    <?php } ?>
	</div>
</div>

<div class="PostWrap MainWrap">
	<div class="container">
    <?php if ( !in_category( 'careers' ) ) { ?>
		  <img class="FeaturedImage" src="<?php echo $feature_img; ?>" alt="<?php the_title(); ?>">
    <?php } ?>
		<?php the_content(); ?>
	</div>	
</div>	
<?php get_footer();?>