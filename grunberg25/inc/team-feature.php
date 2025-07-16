<?php
function team_feature()
{
    ob_start();

    $exclude_ids = [33423, 33442, 33384, 33519, 33502]; // IDs of team members to exclude

    // Get all team members
    $team_members = get_posts([
        'post_type' => 'team_member',
        'numberposts' => -1,
        'post__not_in' => $exclude_ids,
    ]);

    $partners = [];
    $staff = [];

    // Categorize into Partners and Others
    foreach ($team_members as $member) {
        $job_title = strtolower(get_field('job_title', $member->ID));
        if (strpos($job_title, 'partner') !== false) {
            $partners[] = $member;
        } else {
            $staff[] = $member;
        }
    }

    // Randomize and slice
    shuffle($partners);
    shuffle($staff);
    $selected_partners = array_slice($partners, 0, 3);
    $selected_staff = array_slice($staff, 0, 3);

    // Combine and shuffle final 6
    $selected = array_merge($selected_partners, $selected_staff);
    shuffle($selected);
?>

    <div class="team-feature-section">
        <?php foreach ($selected as $member): ?>
            <div class="team-featureOuter">
                <div class="team-feature">
                    <div class="team-feature-img">
                        <?php
                        $alt_image = get_field('alternative_image', $member->ID);
                        if ($alt_image): ?>
                            <a href="<?php echo get_permalink($member->ID); ?>">
                                <img src="<?php echo esc_url($alt_image); ?>" alt="<?php echo esc_attr(get_the_title($member->ID)); ?>" style="width: 231px; height: 300px;">
                            </a>
                        <?php else: ?>
                            <a href="<?php echo get_permalink($member->ID); ?>">
                                <?php echo get_the_post_thumbnail($member->ID, 'medium'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="team-feature-info">
                        <a href="<?php echo get_permalink($member->ID); ?>">
                            <h6><?php echo esc_html($member->post_title); ?></h6>
                        </a>
                        <p><?= esc_html(get_field('job_title', $member->ID)) ?></p>
                        <a href="mailto:<?= antispambot(get_field('email', $member->ID)) ?>"><?= antispambot(get_field('email', $member->ID)) ?></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php
    return ob_get_clean();
}
?>