<?php get_header(); ?>

<div class="ArchiveWrap MainWrap">
    <div class="OpeningContent">
        <div class="container">
            <div class="TitleWrap">
                <?php if (function_exists('yoast_breadcrumb')): ?>
                    <?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
                <?php endif; ?>

                <h1>Meet the team</h1>
                <blockquote>
                    <p><br>Our experienced accountants are at the heart of everything we do – they are the great people behind our great results.</p>
                </blockquote>
                <p>Get to know the friendly faces behind the expert advice.</p>
            </div>
        </div>
    </div>

    <div class="ArchiveItemWrap">
        <div class="container">

            <div class="TeamFilters">
                <!-- Search form -->
                <form method="get" action="<?php echo home_url('/meet-the-team/'); ?>" class="team-search-form">
                    <input type="text" name="team_search" value="<?php echo isset($_GET['team_search']) ? esc_attr($_GET['team_search']) : ''; ?>" placeholder="Search team members...">
                    <button type="submit">Search</button>
                </form>

                <!-- Filter dropdown -->
                <div class="team-filter">
                    <select class="team-filter-dropdown" data-filter-dropdown>
                        <option value="all">Show all</option>
                        <?php
                        // Define which term slugs to show:
                        $term_slugs_to_show = array('accounts-and-audit', 'assistant-managers', 'cloud-accounting', 'cloud-accounting-services', 'credit-control', 'employee-of-the-month', 'human-resources', 'managers', 'partners', 'payroll', 'taxation');

                        $terms = get_terms(array(
                            'taxonomy'   => 'team_category',
                            'slug'       => $term_slugs_to_show,
                            'hide_empty' => true,
                        ));

                        foreach ($terms as $term) {
                            echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <?php
            // Prepare WP_Query
            $team_search = isset($_GET['team_search']) ? sanitize_text_field($_GET['team_search']) : '';

            $args = array(
                'post_type'      => 'team_member',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            );

            // If search entered, add meta_query + title search
            if (!empty($team_search)) {
                $args['meta_query'] = array(
                    'relation' => 'OR',
                    array(
                        'key'     => 'job_title',
                        'value'   => $team_search,
                        'compare' => 'LIKE'
                    ),
                    array(
                        'key'     => 'email',
                        'value'   => $team_search,
                        'compare' => 'LIKE'
                    ),
                    array(
                        'key'     => 'direct_telephone',
                        'value'   => $team_search,
                        'compare' => 'LIKE'
                    ),
                    array(
                        'key'     => 'tel',
                        'value'   => $team_search,
                        'compare' => 'LIKE'
                    ),
                    array(
                        'key'     => 'services',
                        'value'   => $team_search,
                        'compare' => 'LIKE'
                    ),
                    array(
                        'key'     => 'qualification',
                        'value'   => $team_search,
                        'compare' => 'LIKE'
                    ),
                    array(
                        'key'     => 'social_links',
                        'value'   => $team_search,
                        'compare' => 'LIKE'
                    ),
                );

                add_filter('posts_search', function ($search, $query) use ($team_search) {
                    global $wpdb;

                    if (!is_admin() && $query->is_main_query() && is_post_type_archive('team_member')) {
                        $search = " AND ( 
                            {$wpdb->posts}.post_title LIKE '%" . esc_sql($team_search) . "%'
                            OR {$wpdb->posts}.post_content LIKE '%" . esc_sql($team_search) . "%'
                        ) ";
                    }

                    return $search;
                }, 10, 2);
            }

            $team_query = new WP_Query($args);
            ?>

            <?php if ($team_query->have_posts()) : ?>
                <div class="archive-loop team-loop">
                    <!-- Start loop -->
                    <?php while ($team_query->have_posts()) : $team_query->the_post(); ?>
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'team_category');
                        $term_slugs = array();
                        if ($terms && ! is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                $term_slugs[] = $term->slug;
                            }
                        }
                        $term_data = implode(' ', $term_slugs);
                        ?>

                        <article <?php post_class(array('archive-post', 'team-member')); ?> data-terms="<?php echo esc_attr($term_data); ?>">

                            <?php if (has_post_thumbnail()) : ?>
                                <?php
                                $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                ?>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="team-thumbnail" style="background-image: url('<?php echo esc_url($thumb_url); ?>');"></div>
                                </a>
                            <?php endif; ?>



                            <div class="team-content">
                                <h3 class="team-name">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>

                                <?php if (get_field('job_title')) : ?>
                                    <p class="team-job-title"><?php the_field('job_title'); ?></p>
                                <?php endif; ?>

                                <?php if (get_field('email')) : ?>
                                    <p class="team-email">
                                        <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
                                    </p>
                                <?php endif; ?>
                            </div>

                        </article>
                    <?php endwhile; ?>
                    <!-- End loop -->
                </div>
            <?php else : ?>
                <p><?php _e('Sorry, no team members found.', 'txtdomain'); ?></p>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

        </div>
    </div>
</div>

<!-- Simple JS filter -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterDropdown = document.querySelector('.team-filter-dropdown');
        const teamMembers = document.querySelectorAll('.team-member');

        if (filterDropdown) {
            filterDropdown.addEventListener('change', function() {
                const filterValue = this.value;

                teamMembers.forEach(function(member) {
                    const terms = member.getAttribute('data-terms') || '';

                    if (filterValue === 'all' || terms.includes(filterValue)) {
                        // First: show the item
                        member.style.display = '';
                        // Then: after small delay, remove .hidden to fade in
                        setTimeout(() => {
                            member.classList.remove('hidden');
                        }, 10);
                    } else {
                        // Add .hidden to fade out
                        member.classList.add('hidden');
                        // After transition, hide completely
                        setTimeout(() => {
                            member.style.display = 'none';
                        }, 300);
                    }
                });
            });
        }
    });
</script>

<?php get_footer(); ?>