<?php
function facts_and_figures()
{
    ob_start();

    if (have_rows('facts_and_figures')) :
?>
        <div class="statistics facts-grid">
            <?php while (have_rows('facts_and_figures')) : the_row();
                $fact_number = get_sub_field('fact_number');
                $fact_symbol = get_sub_field('fact_symbol');
                $fact_text   = get_sub_field('fact_text');

                // Sanitize ID for span using text
                $id_base = strtolower(preg_replace('/[^a-z0-9]+/', '-', $fact_text));
            ?>
                <div>
                    <?php if ($fact_symbol) : ?>
                        <span id="<?php echo esc_attr($id_base); ?>" class="fact-text">
                            <span class="custom-counter blue" style="font-size: 130px;" data-target="<?php echo esc_attr($fact_number); ?>">1</span>
                            <span class="blue" style="font-size:70px;"><?php echo esc_html($fact_symbol); ?></span>
                        </span>
                    <?php else : ?>
                        <span id="<?php echo esc_attr($id_base); ?>" class="custom-counter blue" style="font-size: 130px;" data-target="<?php echo esc_attr($fact_number); ?>">1</span>
                    <?php endif; ?>

                    <div class="blue" style="font-size:32px;">
                        <?php echo esc_html($fact_text); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
<?php
    endif;

    return ob_get_clean();
}
?>
