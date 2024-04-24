<?php get_header() ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
            $hero_title = get_theme_mod('set_hero_title', 'Your Title Goes Here');
            $hero_subtitle = get_theme_mod('set_hero_subtitle', 'Your interesting subtitle');

            $hero_button_link = get_theme_mod('set_hero_button_link', '#');
            $hero_button_text = get_theme_mod('set_hero_button_text', 'Learn More');

            $hero_height = get_theme_mod('set_hero_height', 800);
            $hero_background = wp_get_attachment_url(get_theme_mod('set_hero_background'));
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
                <h2>Services</h2>
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
                <h2>Latest Items</h2>
                <div class="container">
                    <?php
                    $args = [
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'category__in' => [10, 11, 12],
                        'category__not_in' => [1],
                    ];

                    /* get_posts() can do the same */
                    $postList = new WP_Query($args);

                    if ($postList->have_posts()) {
                        while ($postList->have_posts()) {
                            $postList->the_post();
                            get_template_part('parts/content', 'latest-news');
                        }
                        wp_reset_postdata();
                    } else {
                        echo "<p>Nothing yet to be displayed</p>";
                    }
                    ?>
                </div>
            </section>
        </main>
    </div>
</div>

<?php get_footer() ?>