<?php
  // select between custom post type file (webinar-posts.php) and default post file (news-posts.php)
  if (get_post_type() === 'webinar') {
    get_template_part('templates/webinar-posts');
  }
  else {
    get_template_part('templates/news-posts');
  }
?>