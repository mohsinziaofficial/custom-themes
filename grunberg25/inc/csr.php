<?php
function csr()
{
    ob_start();

    if (have_rows('corporate_social_responsibility')) :
?>
        <div class="csr-grid">
            <?php while (have_rows('corporate_social_responsibility')) : the_row(); ?>
                <div class="csr-item">
                    <img src="<?php the_sub_field('csr_icon'); ?>" alt="" />
                    <p><?php the_sub_field('csr_label'); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
<?php
    endif;

    return ob_get_clean();
}
?>
