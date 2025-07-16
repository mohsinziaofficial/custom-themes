<?php
function benefits()
{
    ob_start();

    if (have_rows('benefits')) :
?>
        <h3 class="white wipe orange-wipe" style="margin-top: 50px;">Benefits</h3>
        <div class="benefits-grid">
            <?php while (have_rows('benefits')) : the_row(); ?>
                <div class="benefit-item">
                    <img src="<?php the_sub_field('benefit_icon'); ?>" alt="" />
                    <p class="white"><?php the_sub_field('benefit_label'); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
<?php
    endif;

    return ob_get_clean();
}
?>