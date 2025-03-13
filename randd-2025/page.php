<?php get_header(); ?>
<div class="PageWrap MainWrap">
  <div class="container">
    <div class="inner-page">
      <div class="inner-page-top">
        <h1 class="page-title">
          <?php the_title(); ?>
        </h1>
        <?php  if($custom_tag_line): ?>
        <p class="tag-line">
          <?php the_field('custom_tag_line');  ?>
        </p>
        <?php endif; ?>
        <?php if($custom_text): ?>
        <p class="tag-line">
          <?php the_field('custom_text');  ?>
        </p>
        <?php endif; ?>
      </div>
      <div class="page-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer();?>
