<?php get_header();?>

<div class="hero">
  <div class="overlay">
    <div class="home-banner-cubes">
      <img class="hero-img" src="<?php bloginfo('template_directory'); ?>/img/cubes.png" />
    </div>
    <div class="container">
      <div class="intro-area">
        <div>
          <h1 class="title">Experienced accountants, friendly faces.</h1>
          <p>We’re experts at advising you on your tax questions!</p>
          <p>
            Whether you need help with general accounting
            <br>and bookkeeping or have a challenging tax issue
            <br>to sort out, we’re here to help you.
          </p>
          <br>&nbsp;
          <p><a href="/contact-us/" class="yellow-bg-button animation-delay">get in touch</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="home-content-main">
    <?php the_content(); ?>
  </div>
</div>

<div class="contact-form-wrap">
  <div class="container">
    <h2>Get in touch</h2>
    <?php echo do_shortcode('[gravityform id="1" title="false"]'); ?>
  </div>
</div>

<?php get_footer();?>