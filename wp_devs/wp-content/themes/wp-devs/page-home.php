<?php get_header() ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="hero" style="background-image: url('http://localhost:8080/wp-content/uploads/2024/04/pexels-lumn-167699-scaled.webp')">
                <div class="overlay" style="min-height: 800px;">
                    <div class="container">
                        <div class="hero-items">
                            <h1>Lorem Ipsum Dolor</h1>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe sit adipisci repellendus similique commodi asperiores, dolores esse aliquid deserunt recusandae fugiat nisi iusto incidunt nulla, laboriosam et ullam animi libero?</p>
                            <a href="#">Learn More</a>
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