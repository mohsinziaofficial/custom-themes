<?php
/**
 * Register shortcode and handle modal rendering
 */

function testimonial_modals($atts)
{
    $atts = shortcode_atts(array(
        'id' => 0,
    ), $atts);

    $id = intval($atts['id']);
    $testimonials = get_field('testimonials');

    if (!$testimonials || !isset($testimonials[$id - 1])) {
        return '<p>Testimonial not found.</p>';
    }

    $testimonial = $testimonials[$id - 1]['testimonial_content'];
    $modal_id = 'testimonial-modal-' . $id;
    $button_id = 'testimonial-button-' . $id;

    // Save modal output for footer injection
    global $testimonial_modal_pool;
    if (!isset($testimonial_modal_pool)) $testimonial_modal_pool = [];

    $testimonial_modal_pool[] = '
        <div id="' . esc_attr($modal_id) . '" class="testimonial-modal" style="display: none;">
            <div class="testimonial-modal-content">
                <span class="testimonial-modal-close" data-modal="' . esc_attr($modal_id) . '">&times;</span>
                <div class="testimonial-content">' . wp_kses_post($testimonial) . '</div>
            </div>
        </div>
    ';

    // Return button HTML
    return '<button id="' . esc_attr($button_id) . '" class="testimonial-button button" data-modal="' . esc_attr($modal_id) . '">Read the full testimonial here</button>';
}

// Inject modals and scripts at the end of the body
function inject_testimonial_modals_to_footer()
{
    global $testimonial_modal_pool;

    if (!empty($testimonial_modal_pool)) {
        foreach ($testimonial_modal_pool as $modal_html) {
            echo $modal_html;
        }

        // Inline styles and script
        ?>
        <style>
            .testimonial-modal {
                position: fixed;
                top: 0; left: 0;
                width: 100vw; height: 100vh;
                background: rgba(0, 0, 0, 0.6);
                display: flex;
                align-items: flex-start;
                justify-content: center;
                z-index: 9999;
                overflow-y: auto;
                padding-top: 60px;
                box-sizing: border-box;
            }

            .testimonial-modal-content {
                background: #fff;
                padding: 30px;
                max-width: 700px;
                width: 90%;
                border-radius: 10px;
                position: relative;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            }

            .testimonial-modal-close {
                position: absolute;
                top: 10px;
                right: 15px;
                font-size: 24px;
                font-weight: bold;
                cursor: pointer;
            }

            .testimonial-button {
                margin-bottom: 20px;
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const openModal = function (modalId) {
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.style.display = 'flex';
                        document.body.style.overflow = 'hidden';
                        window.scrollTo(0, 0);
                    }
                };

                const closeModal = function (modalId) {
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.style.display = 'none';
                        document.body.style.overflow = '';
                    }
                };

                document.querySelectorAll('.testimonial-button').forEach(function (button) {
                    button.addEventListener('click', function () {
                        openModal(this.getAttribute('data-modal'));
                    });
                });

                document.querySelectorAll('.testimonial-modal-close').forEach(function (closeBtn) {
                    closeBtn.addEventListener('click', function () {
                        closeModal(this.getAttribute('data-modal'));
                    });
                });

                document.addEventListener('click', function (e) {
                    if (e.target.classList.contains('testimonial-modal')) {
                        closeModal(e.target.id);
                    }
                });

                document.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape') {
                        document.querySelectorAll('.testimonial-modal').forEach(function (modal) {
                            modal.style.display = 'none';
                        });
                        document.body.style.overflow = '';
                    }
                });
            });
        </script>
        <?php
    }
}
add_action('wp_footer', 'inject_testimonial_modals_to_footer');
