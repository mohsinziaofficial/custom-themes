<?php
/*
Template Name: Contact Page Template
*/
get_header();
?>

<div class="PageWrap MainWrap ContactPage">  
  <div class="page-head">
    <div class="container">
      <div class="inner-page-hero">
        <div class="left"><h1 class="page-title"><?php the_title(); ?></h1></div>
        <div class="right"></div>
      </div>
    </div>
  </div>
  <div class="container">
    <?php the_content(); ?>
  </div>
</div>	
<?php get_footer();?>