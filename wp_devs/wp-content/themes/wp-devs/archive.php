<?php
/* is usually reserved for the blog page, or as a last fallback 
* https://developer.wordpress.org/themes/basics/template-hierarchy/
* https://developer.wordpress.org/themes/basics/template-files/
*/ ?>

<?php get_header() ?>
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height ?>" width="<?php echo get_custom_header()->width ?>" alt="">
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php the_archive_title('<h1 class="archive-title">', '</h1>'); ?>
            <?php the_archive_description('<div class="archive-description"', '</div>'); ?>
            <div class="container">
                <div class="archive-items">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            get_template_part('parts/content');
                        }
                    ?>
                        <div class="wpdevs-pagination">
                            <div class="pages new">
                                <?php previous_posts_link("<< Newer posts") ?>
                            </div>
                            <div class="pages old">
                                <?php next_posts_link("Older posts >>") ?>

                            </div>
                        </div>
                    <?php
                    } else {
                        echo "<p>Nothing yet to be displayed</p>";
                    }
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