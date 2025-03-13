<?php
  $feature_img = get_the_post_thumbnail_url();
  $category = get_the_category();
  $cat_name = $category[0]->cat_name;

  get_header();
?>
<div class="post-page-header">
  <div class="container">
    <div class="page-head">
      <div class="inner-page-hero">
        <div class="left">
          <h1 class="page-title"><?php the_title(); ?></h1>
          <h2 class="color-white"><?php the_date(); ?></h2>
          <h2 class="color-white"><?php echo $cat_name; ?></h2>
        </div>
        <div class="right">
          <?php if($feature_img): ?>
            <img class="post-feature-img" src="<?php echo $feature_img; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
          <?php else: ?>
            <img class="post-feature-img" src="/wp-content/themes/xamatech2024/img/post-feature-img.png" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container" style="padding-top: 20px;">
	<div class="breadcrumbs-wrap">
		<?php
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		} ?>
	</div>
</div>
<div class="post-content">
	<div class="container">
    <?php the_content(); ?>
  </div>
</div>
<hr>
<?php get_footer();?>