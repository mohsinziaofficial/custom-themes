<?php
function country_flags()
{
    ob_start();

    $args = array(
        'post_type' => 'flags',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    );

    $flags_query = new WP_Query($args);

    if ($flags_query->have_posts()) {
        echo '<div class="flags-section">';
        echo '<div class="flags-content">';
        echo '<h2>We speak your language</h2>';
        echo '<h2>Our <span class="wipe yellow-wipe">international</span> team of professionals speak:</h2>';
        echo '</div>';
        echo '<div class="language-flags-grid">';

        while ($flags_query->have_posts()) {
            $flags_query->the_post();
            $post_id = get_the_ID();
            $language_name = get_the_title();

            $flag_image_field = get_field('country_flags', $post_id);

            if (is_array($flag_image_field) && isset($flag_image_field['url'])) {
                $flag_image = $flag_image_field['url'];
            } elseif (is_numeric($flag_image_field)) {
                $flag_image = wp_get_attachment_url($flag_image_field);
            } else {
                $flag_image = $flag_image_field;
            }

            if ($flag_image && $language_name) {
                echo '<div class="language-flag-item">';
                echo '<img src="' . esc_url($flag_image) . '" alt="' . esc_attr($language_name) . '">';
                echo '<span class="language-name">' . esc_html($language_name) . '</span>';
                echo '</div>';
            }
        }

        echo '</div>'; // end grid
        echo '</div>'; // end section
    } else {
        echo 'No flags found. Please add some flags to the Flags custom post type.';
    }

    wp_reset_postdata();

    return ob_get_clean();
}

// Add CSS to the head
function country_flags_styles()
{
    echo '<style>
        .flags-section {
            background-color: #fff;
            padding: 40px 0;
            overflow: hidden;
        }
        .flags-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .flags-section h2 {
            text-align: center;
            color: #1e3a8a;
            font-size: 24px;
            margin-bottom: 30px;
        }
        .language-flags-grid {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(6, 1fr);
            padding: 0 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        @media (max-width: 1024px) {
            .language-flags-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        @media (max-width: 768px) {
            .language-flags-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (max-width: 480px) {
            .language-flags-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        .language-flag-item {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .language-flag-item img {
            width: 100%;
            max-width: 100px;
            height: auto;
            margin-bottom: 10px;
        }
        .language-name {
            font-size: 16px;
            color: #333;
            text-align: center;
        }
    </style>';
}
add_action('wp_head', 'country_flags_styles');

// ❌ Remove Slick initialization — no longer needed
remove_action('wp_footer', 'initialize_slick_slider', 100);
