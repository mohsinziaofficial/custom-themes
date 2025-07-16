<?php
function wellbeing()
{
    ob_start();

    if (have_rows('wellbeing')) :
?>
        <div class="wellbeing-grid">
            <?php while (have_rows('wellbeing')) : the_row(); ?>
                <div class="wellbeing-item">
                    <img src="<?php the_sub_field('wellbeing_icon'); ?>" alt="" />
                    <p class="white"><?php the_sub_field('wellbeing_label'); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
<?php
    endif;

    return ob_get_clean();
}
?>