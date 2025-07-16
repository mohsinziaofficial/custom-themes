<?php
// Template name: Listing page

get_header(); ?>

<div class="PageWrap MainWrap">
    <div class="listing-page-container no-container">
        <div class="listing-page-header">
            <div class="OpeningContent panel">
                <div class="listings-header">
                    <div class="left-container" style="padding-bottom: 0 !important; padding-top: 0 !important;">
                        <div class="TitleWrap">
                            <?php if (function_exists('yoast_breadcrumb')): ?>
                                <?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
                            <?php endif; ?>

                            <h1><?php the_title(); ?></h1>
                        </div>
                        <?php
                        // Retrieve the editable content from WordPress
                        $editable_content = get_field('listing_page_content');
                        if ($editable_content) {
                            echo '<div class="editable-content">' . $editable_content . '</div>';
                        } else {
                            the_content();
                        }
                        ?>
                        <div class="ListingsArea">
                            <?php
                            // Check rows exists.
                            if (have_rows('page_list')):
                                // Loop through rows.
                                while (have_rows('page_list')) : the_row();
                                    // Load sub field value.
                                    $page_name = get_sub_field('page_name');
                                    $url = get_sub_field('url');
                            ?>
                                    <div class="ListingItem">
                                        <a href="<?php echo $url; ?>" target="_blank"><?php echo $page_name; ?><i class="fa-solid fa-chevron-right"></i></a>
                                    </div>
                            <?php
                                // End loop.
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="middle-container"></div>
                    <div class="right-container <?php echo (get_the_title() === 'Events & webinars') ? 'events-webinars-right' : ''; ?>">
                        <?php if (get_the_ID() == 34247) : ?>
                            <img src="/wp-content/uploads/2025/07/events-webinars.png" alt="" class="listing-header-img">
                        <?php elseif (get_the_ID() == 33860) : ?>
                            <img src="/wp-content/uploads/2025/07/newsroom.png" alt="" class="listing-header-img">
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    global $post;

    // Get the front page ID to exclude it from results
    $front_page_id = get_option('page_on_front');

    // Try to get child pages first
    $related_pages = get_pages([
        'child_of'    => $post->ID,
        'parent'      => $post->ID,
        'exclude'     => $front_page_id,
        'sort_column' => 'menu_order',
        'sort_order'  => 'ASC'
    ]);

    // If no children, get siblings instead
    if (empty($related_pages)) {
        $related_pages = get_pages([
            'child_of'    => $post->post_parent,
            'parent'      => $post->post_parent,
            'exclude'     => implode(',', [$post->ID, $front_page_id]),
            'sort_column' => 'menu_order',
            'sort_order'  => 'ASC'
        ]);
    }

    // Only show the whole section if we have related pages
    if (!empty($related_pages)): ?>
        <div class="PageRelatedLinks GridBox panel">
            <div class="container">
                <h3>Related <span class="wipe blue-wipe">link<?php echo (count($related_pages) > 1) ? 's' : ''; ?></span></h3>
                <ul class="related-links">
                    <?php foreach ($related_pages as $page): ?>
                        <li><a href="<?php echo get_permalink($page->ID); ?>"><?php echo esc_html($page->post_title); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>