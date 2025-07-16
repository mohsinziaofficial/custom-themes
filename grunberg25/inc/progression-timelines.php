<?php
function progression_timeline()
{
    ob_start();

    if (have_rows('progression_timelines')) :
        $index = 0;
        ?>
        <div class="progression-timelines">
            <?php while (have_rows('progression_timelines')) : the_row(); $index++; ?>
                <?php
                $photo = get_sub_field('timeline_photo');
                $forename = get_sub_field('timeline_forename');
                $surname = get_sub_field('timeline_surname');
                $button_text = get_sub_field('button_text');
                $button_link = get_sub_field('button_link');
                ?>

                <div class="timeline-entry">
                    <?php if ($photo) : ?>
                        <div class="timeline-photo">
                            <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($forename . ' ' . $surname); ?>">
                        </div>
                    <?php endif; ?>

                    <div class="timeline-forename"><strong><?php echo esc_html($forename); ?></strong></div>
                    <div class="timeline-surname"><?php echo esc_html($surname); ?></div>

                    <!-- Trigger Button -->
                    <button class="button open-modal-btn" data-modal="modal-<?php echo $index; ?>">
                        See <?php echo esc_html($forename); ?>'s Career Progression
                    </button>
                </div>

                <!-- Modal -->
                <div id="modal-<?php echo $index; ?>" class="career-modal">
                    <div class="career-modal-content">
                        <span class="close-modal" data-modal="modal-<?php echo $index; ?>">&times;</span>

                        <?php if ($photo) : ?>
                            <div class="timeline-photo">
                                <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($forename . ' ' . $surname); ?>">
                            </div>
                        <?php endif; ?>

                        <h5 class="modal-name"><strong><?php echo esc_html($forename); ?></strong>&nbsp;<?php echo esc_html($surname); ?></h5>

                        <?php if (have_rows('career_tree')) : ?>
                            <div class="career-tree">
                                <?php while (have_rows('career_tree')) : the_row(); ?>
                                    <?php $stage = get_sub_field('career_stage'); ?>
                                    <?php if ($stage) : ?>
                                        <div class="career-stage">
                                            <span class="bullet"></span>
                                            <span class="stage-text"><?php echo esc_html($stage); ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                                <div class="career-line"></div>
                            </div>
                        <?php endif; ?>

                        <?php if ($button_text && $button_link) : ?>
                            <div class="timeline-button">
                                <a class="button" href="<?php echo esc_url($button_link); ?>">
                                    <?php echo esc_html($button_text); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const openButtons = document.querySelectorAll('.open-modal-btn');
                const closeButtons = document.querySelectorAll('.close-modal');

                openButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const modalId = btn.getAttribute('data-modal');
                        document.getElementById(modalId).style.display = 'block';
                    });
                });

                closeButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const modalId = btn.getAttribute('data-modal');
                        document.getElementById(modalId).style.display = 'none';
                    });
                });

                window.addEventListener('click', function (e) {
                    if (e.target.classList.contains('career-modal')) {
                        e.target.style.display = 'none';
                    }
                });
            });
        </script>

        <style>
            .modal-name {
                color: var(--white);
                text-align: center;
            }

            .timeline-entry {
                text-align: center;
                color: white;
            }

            .career-modal {
                display: none;
                position: fixed;
                z-index: 999;
                left: 0; top: 0;
                width: 100%; height: 100%;
                overflow: auto;
                background-color: rgba(0,0,0,0.8);
            }

            .career-modal-content {
                background-color: var(--blue);
                margin: 5% auto;
                padding: 2rem;
                border: 1px solid #888;
                width: 90%;
                max-width: 600px;
                position: relative;
                color: white;
                text-align: left;
            }

            .close-modal {
                color: white;
                position: absolute;
                top: 10px;
                right: 20px;
                font-size: 30px;
                cursor: pointer;
            }

            .career-tree {
                position: relative;
                margin: auto;
                width: fit-content;
            }

            .career-stage {
                display: flex;
                align-items: center;
                margin-bottom: 1rem;
                position: relative;
            }

            .career-stage .bullet {
                width: 10px;
                height: 10px;
                background-color: white;
                border-radius: 50%;
                margin-right: 10px;
                z-index: 2;
            }

            .career-line {
                position: absolute;
                top: 0;
                left: 5px;
                bottom: 0;
                width: 2px;
                background-color: white;
                z-index: 1;
            }

            .timeline-button {
                margin-top: 2rem;
                text-align: center;
            }

            .timeline-button .button {
                background: var(--orange);
                color: white;
                padding: 0.75rem 1.25rem;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                display: inline-block;
            }

            .button.open-modal-btn {
                margin-top: 1rem;
                background: var(--orange);
                border: none;
                padding: 0.75rem 1.25rem;
                color: white;
                border-radius: 4px;
                cursor: pointer;
            }

            .button.open-modal-btn:hover, .timeline-button .button:hover {
                background: #ee4d2b;
            }
        </style>
        <?php
    endif;

    return ob_get_clean();
}
?>
