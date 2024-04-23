<?php get_header() ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="hero">
                Hero
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
                    ?>
                            <article class="latest-news">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                                <div class="meta-info">
                                    <p>
                                        by <span><?php the_author_posts_link(); ?></span>
                                        Categories <span> <?php the_category(' ') ?> </span>
                                        Tags: <?php the_tags('', ', ') ?>
                                    </p>
                                    <p><span><?php echo get_the_date(); ?></span></p>
                                </div>
                                <?php the_excerpt(); ?>
                            </article>
                    <?php
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