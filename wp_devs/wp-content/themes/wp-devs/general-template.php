<?php

/*
Template Name: General Template
*/
?>

<?php get_header() ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <div class="general-template">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                    ?>
                            <article>
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            </article>
                    <?php
                        }
                    } else {
                        echo "<p>Nothing yet to be displayed</p>";
                    }
                    ?>
                </div>
            </div>

        </main>
    </div>
</div>

<?php get_footer() ?>