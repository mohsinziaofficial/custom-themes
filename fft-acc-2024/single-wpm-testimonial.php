<?php get_header(); ?>
<div class="inner-page-top">
  <div class="container">
    <h1 class="title"><?php echo the_title(); ?></h1>
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
	</div>
</div>

<div class="PostWrap MainWrap">
  <div class="container">
    <?php the_content(); ?>
  </div>
</div>
<?php get_footer();?>