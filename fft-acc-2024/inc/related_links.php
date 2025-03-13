<?php $related_links = get_field('related_links');
  if ($related_links) : ?>
  <div class="related-links-wrap">
    <div class="related-links">
      <h1>Related links</h1>
      <?php foreach ($related_links as $post) :
          setup_postdata($post); ?>
        <p>
          <a class="link-item" href="<?php the_permalink($post -> ID); ?>">
            <?php echo $post -> post_title; ?>
          </a>
        </p>
      <?php endforeach; ?>
      <!-- // Reset the global post object so that the rest of the page works correctly. -->
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
<?php endif; ?>