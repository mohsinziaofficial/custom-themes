<?php
function career_progression()
{
    ob_start();

    if (have_rows('career_progression')) :
?>
        <div class="career-grid">
            <?php while (have_rows('career_progression')) : the_row();
                $image = get_sub_field('staff_image');
                $forename = get_sub_field('forename');
                $surname = get_sub_field('surname');
                $button_label = get_sub_field('button_label');
                $button_link = get_sub_field('button_link');
            ?>
                <div class="career-item">
                    <?php if ($image) : ?>
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($forename . ' ' . $surname); ?>" class="staff-image" />
                    <?php endif; ?>

                    <div class="staff-name">
                        <strong><?php echo esc_html($forename); ?></strong><br />
                        <?php echo esc_html($surname); ?>
                    </div>

                    <?php if (have_rows('career_timeline')) : ?>
                        <ul class="career-steps">
                            <?php while (have_rows('career_timeline')) : the_row();
                                $stage = get_sub_field('career_stage');
                            ?>
                                <li><?php echo esc_html($stage); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if ($button_label && $button_link) : ?>
                        <a href="<?php echo esc_url($button_link); ?>" class="button white-button">
                            <?php echo esc_html($button_label); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>

        <style>
            .career-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 40px;
            }

            .career-item {
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .staff-image {
                max-width: 150px;
                height: auto;
                border-radius: 50%;
                margin-bottom: 15px;
            }

            .staff-name {
                margin-bottom: 15px;
                font-size: 18px;
            }

            .career-steps {
                position: relative;
                list-style: none;
                padding-left: 0;
                margin: 0 0 20px 0;
            }

            .career-steps li {
                position: relative;
                padding-left: 20px;
                text-align: left;
                margin-bottom: 20px;
            }

            .career-steps li::before {
                content: '';
                position: absolute;
                left: 0;
                top: 5px;
                width: 10px;
                height: 10px;
                background-color: #000;
                border-radius: 50%;
            }

            .career-steps li::after {
                content: '';
                position: absolute;
                left: 4px;
                top: 15px;
                width: 2px;
                height: 100%;
                background-color: #000;
            }

            .career-steps li:last-child::after {
                display: none;
            }

            .button.white-button {
                display: inline-block;
                padding: 10px 20px;
                margin-top: 10px;
                background-color: #fff;
                color: #000;
                border: 1px solid #000;
                text-decoration: none;
                transition: background 0.3s;
            }

            .button.white-button:hover {
                background-color: #f0f0f0;
            }
        </style>
<?php
    endif;

    return ob_get_clean();
}
?>
