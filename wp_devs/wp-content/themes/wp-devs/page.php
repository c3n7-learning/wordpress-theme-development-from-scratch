<?php
/* is usually reserved for the blog page, or as a last fallback 
* https://developer.wordpress.org/themes/basics/template-hierarchy/
*/ ?>

<?php get_header() ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <div class="page-item">
                    <?php
                    while (have_posts()) {
                        the_post();
                    ?>
                        <article>
                            <header>
                                <h1><?php the_title(); ?></h1>
                            </header>
                            <?php the_content(); ?>
                        </article>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </main>
    </div>
</div>

<?php get_footer() ?>