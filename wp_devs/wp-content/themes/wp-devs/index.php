<?php
/* is usually reserved for the blog page, or as a last fallback 
* https://developer.wordpress.org/themes/basics/template-hierarchy/
*/ ?>

<?php get_header() ?>
<img src="<?php header_image(); ?>" height="<?php echo esc_attr(get_custom_header()->height) ?>" width="<?php echo esc_attr(get_custom_header()->width) ?>" alt="">
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <h1><?php esc_html_e('Blog', 'wp-devs') ?></h1>
            <div class="container">
                <div class="blog-items">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) {
                            the_post();
                            get_template_part('parts/content');
                        }
                    ?>
                        <div class="wpdevs-pagination">
                            <div class="pages new">
                                <?php previous_posts_link(esc_html__("<< Newer posts", 'wp-devs')) ?>
                            </div>
                            <div class="pages old">
                                <?php next_posts_link(esc_html__("Older posts >>", 'wp-devs')) ?>
                            </div>
                        </div>
                    <?php
                    else : ?>
                        <p><?php esc_html_e('Nothing yet to be displayed', 'wp-devs') ?></p>
                    <?php
                    endif;
                    ?>
                </div>

                <!-- You can create a custom sidbar, save it as sidebar-bottom.php, register it with the same name, and add it as get_sidebar('bottom') -->
                <?php
                /* If I want the code snippet <?php get_sidebar( 'home' ); ?>  to call some content, I need to have a file named sidebar-home.php at the root of my theme's folder. */
                ?>
                <?php get_sidebar(); ?>
            </div>
        </main>
    </div>
</div>

<?php get_footer() ?>