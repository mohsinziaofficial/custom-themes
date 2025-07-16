<?php
function testimonial_carousel() {
    ob_start();
    
    $args = array(
        'post_type' => 'testimonials',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $testimonials_query = new WP_Query($args);

    if ($testimonials_query->have_posts()) {
        echo '<div class="testimonial-carousel-wrapper">';
        echo '<div class="testimonial-carousel">';
        
        while ($testimonials_query->have_posts()) {
            $testimonials_query->the_post();
            $post_id = get_the_ID();
            
            $testimonial_text = get_field('testimonial', $post_id);
            $name = get_field('name', $post_id);
            $company = get_field('company', $post_id);
            
            if ($testimonial_text) {
                echo '<div class="testimonial-slide">';
                echo '<div class="testimonial-content">';
                echo '<blockquote>' . esc_html($testimonial_text) . '</blockquote>';
                echo '<span class="quote-end">&rdquo;</span>';
                echo '<div class="testimonial-author">';
                if ($name) {
                    echo '<p class="author-name">' . esc_html($name) . '</p>';
                }
                if ($company) {
                    echo '<p class="author-company">' . esc_html($company) . '</p>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        
        echo '</div>';
        echo '</div>';
    } else {
        echo 'No testimonials found. Please add some testimonials to the Testimonial custom post type.';
    }

    wp_reset_postdata();

    return ob_get_clean();
}

// Add CSS to the head
function testimonial_carousel_styles() {
    echo '<style>
        .testimonial-carousel-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            position: relative;
        }
        .testimonial-slide {
            text-align: center;
            padding: 0 20px;
        }
        .testimonial-content {
            background-color: #f0f0f0;
            border-top: 4px solid #00a0b0;
            padding: 30px;
            position: relative;
            margin-bottom: 30px; /* Add space for dots */
        }
        .testimonial-content::before {
            content: "\201C";
            font-size: 60px;
            color: #00a0b0;
            position: absolute;
            top: 10px;
            left: 20px;
        }
        .quote-end {
            content: "\201D";
            font-size: 60px;
            color: #00a0b0;
            position: absolute;
            bottom: 70px;
            right: 20px;
        }
        blockquote {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
            margin-bottom: 20px;
        }
        .testimonial-author {
            margin-top: 20px;
        }
        .author-name {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 5px;
        }
        .author-company {
            font-size: 14px;
            color: #666;
        }
        .slick-dots {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 0;
            margin: 0;
            list-style: none;
            text-align: center;
        }
        .slick-dots li {
            display: inline-block;
            margin: 0 5px;
        }
        .slick-dots li button {
            font-size: 0;
            line-height: 0;
            display: block;
            width: 10px;
            height: 10px;
            padding: 5px;
            cursor: pointer;
            color: transparent;
            border: 0;
            outline: none;
            background: transparent;
        }
        .slick-dots li button:before {
            font-size: 12px;
            color: #00a0b0;
            content: "•";
        }
    </style>';
}
add_action('wp_head', 'testimonial_carousel_styles');

// Enqueue Slick Slider
function enqueue_testimonial_carousel_scripts() {
    wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
    wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_testimonial_carousel_scripts');

// Initialize Slick Slider
function initialize_testimonial_carousel() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($){
        $('.testimonial-carousel').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev">Previous</button>',
            nextArrow: '<button type="button" class="slick-next">Next</button>'
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'initialize_testimonial_carousel', 100);

// Add shortcode
add_shortcode('testimonial_carousel', 'testimonial_carousel');
?>