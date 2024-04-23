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