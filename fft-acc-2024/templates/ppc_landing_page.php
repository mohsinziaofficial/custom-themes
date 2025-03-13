<?php

/**
Template Name: ppc landingg page
**/

?>
<div id="ppc-page-top"></div>
<?php get_header(); ?>

<div class="inner-page-top">
  <div class="container">
    <h1 class="title"><?php the_title(); ?></h1>
    <img class="img-top" src="/wp-content/uploads/2024/08/cubes-bottom-right-2.png" >
  </div>
</div>

<div class="PageWrap MainWrap">
	<div class="container">
    <div class="content-main">
        <?php the_content(); ?>
    </div>
	</div>
</div>
<div id="what-our-clients-say" class="testimonials-wrap">
  <div class="container">
    <h2>What our clients say</h2>
    <div>
      <?php echo do_shortcode('[testimonial_view id="1"]'); ?>
    </div>
  </div>
</div>
<div style="margin-bottom: 50px;" id="get-in-contact"></div>
<div  class="contact-form-wrap">
  <div class="container">
    <h2>Get in touch</h2>
    <p class="p-large">Ready to take the next step in your financial journey?</p>
    <p>Contact us today to find out how FFT can support you. Whether you need help with your personal finances or business accounting, our friendly and open-minded team is here to assist you.</p>
    <?php echo do_shortcode('[gravityform id="4" title="false"]'); ?>
  </div>
</div>


<?php get_footer();?>