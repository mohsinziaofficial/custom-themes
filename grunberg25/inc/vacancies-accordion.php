<?php
function vacancies_accordion()
{
    $post_id = get_the_ID(); // Get current post ID
    if (!$post_id) {
        return ''; // No post context, return empty
    }

    if (!have_rows('vacancies', $post_id)) {
        return ''; // No repeater rows, return empty
    }

    ob_start();
?>
    <div class="acf-accordion">
        <?php while (have_rows('vacancies', $post_id)): the_row();
            $header = get_sub_field('header');
            $content = get_sub_field('content');
        ?>
            <div class="accordion-item">
                <button class="accordion-header" type="button">
                    <?php echo esc_html($header); ?>
                </button>
                <div class="accordion-content">
                    <?php echo wp_kses_post($content); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php

    return ob_get_clean();
}
?>