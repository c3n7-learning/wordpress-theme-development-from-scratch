<article class="latest-news">
    <!--  https://codex.wordpress.org/Conditional_Tags -->
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('large'); ?>
        </a>
    <?php endif; ?>
    <a href="<?php the_permalink(); ?>">
        <h3><?php the_title(); ?></h3>
    </a>
    <div class="meta-info">
        <p>
            <?php _e('by', 'wp-devs') ?> <span><?php the_author_posts_link(); ?></span>
            <?php if (has_category()) : ?>
                <?php _e('Categories', 'wp-devs') ?> <span> <?php the_category(' ') ?> </span>
            <?php endif; ?>
            <?php if (has_tag()) : ?>
                <?php _e('Tags', 'wp-devs') ?>: <?php the_tags('', ', ') ?>
            <?php endif; ?>
        </p>
        <p><span><?php echo get_the_date(); ?></span></p>
    </div>
    <?php the_excerpt(); ?>
</article>