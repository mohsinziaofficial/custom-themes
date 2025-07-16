<?php
function latest_news()
{
    ob_start();

?>
    <div class="latestNewsSection">
        <div class="newsContainer">
            <div class="latestNewsCarousel">
                <?php
                $latest_news_query = new WP_Query(array(
                    'post_type'      => 'post',
                    'posts_per_page' => 4,
                ));

                // Check if there are posts
                if ($latest_news_query->have_posts()) :
                    // Loop through the posts
                    while ($latest_news_query->have_posts()) :
                        $latest_news_query->the_post();
                ?>
                        <div class="latestNewsItem">
                            <img class="latest-news-logo" src="https://grunberg25.je-hosting.co.uk/wp-content/uploads/2025/06/Grunberg-RGB-Logo-mark-only.png" alt="Grunberg Logo">
                            <h6 class="blue"><?php the_title(); ?></h6>
                            <p><?php echo get_the_date(); ?></p>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 10, '...'); ?></p>
                        </div>
                    <?php
                    endwhile;
                    // Reset post data after custom query
                    wp_reset_postdata();
                else :
                    // Display fallback content if no posts are found
                    ?>
                    <p>No latest news available at the moment.</p>
                <?php endif; ?>
            </div>
            <a href="/newsroom/" class="button header-button">More News</a>
        </div>
    </div>
<?php
    return ob_get_clean();
}
?>