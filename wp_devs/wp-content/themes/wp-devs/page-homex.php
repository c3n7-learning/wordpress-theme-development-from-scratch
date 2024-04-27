<?php get_header() ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
            $hero_title = esc_html(get_theme_mod('set_hero_title', __('Your Title Goes Here', 'wp-devs')));
            $hero_subtitle = esc_html(get_theme_mod('set_hero_subtitle', __('Your interesting subtitle', 'wp-devs')));

            $hero_button_link = esc_url(get_theme_mod('set_hero_button_link', '#'));
            $hero_button_text = esc_html(get_theme_mod('set_hero_button_text', __('Learn More', 'wp-devs')));

            $hero_height = esc_attr(get_theme_mod('set_hero_height', 800));
            $hero_background = esc_attr(wp_get_attachment_url(get_theme_mod('set_hero_background')));
            ?>
            <section class="hero" style="background-image: url('<?php echo $hero_background; ?>')">
                <div class="overlay" style="min-height: <?php echo $hero_height; ?>px;">
                    <div class="container">
                        <div class="hero-items">
                            <h1><?php echo $hero_title; ?></h1>
                            <p><?php echo nl2br($hero_subtitle); ?></p>
                            <a href="<?php echo $hero_button_link; ?>">
                                <?php echo $hero_button_text  ?>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="services">
                <h2><?php esc_html_e('Services', 'wp-devs') ?></h2>
                <div class="container">
                    <div class="services-item">
                        <?php
                        if (is_active_sidebar('service-1')) {
                            dynamic_sidebar('service-1');
                        }
                        ?>
                    </div>
                    <div class="services-item">
                        <?php
                        if (is_active_sidebar('service-2')) {
                            dynamic_sidebar('service-2');
                        }
                        ?>
                    </div>
                    <div class="services-item">
                        <?php
                        if (is_active_sidebar('service-3')) {
                            dynamic_sidebar('service-3');
                        }
                        ?>
                    </div>
                </div>
            </section>
            <section class="home-blog">
                <h2><?php esc_html_e('Latest Items', 'wp-devs') ?></h2>
                <div class="container">
                    <?php
                    $per_page = esc_html(get_theme_mod('set_per_page', 3));
                    $category_include = esc_html(get_theme_mod('set_category_include'));
                    $category_exclude = esc_html(get_theme_mod('set_category_exclude'));

                    $args = [
                        'post_type' => 'post',
                        'posts_per_page' => $per_page,
                        'category__in' => explode(',', $category_include),
                        'category__not_in' => explode(',', $category_exclude),
                    ];

                    /* get_posts() can do the same */
                    $postList = new WP_Query($args);

                    if ($postList->have_posts()) :
                        while ($postList->have_posts()) {
                            $postList->the_post();
                            get_template_part('parts/content', 'latest-news');
                        }
                        wp_reset_postdata();
                    else : ?>
                        <p><?php esc_html_e('Nothing yet to be displayed', 'wp-devs') ?></p>
                    <?php
                    endif;
                    ?>
                </div>
            </section>
        </main>
    </div>
</div>

<?php get_footer() ?>