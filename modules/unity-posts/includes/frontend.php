<?php

$query = FLBuilderLoop::query($settings);

?>


<?php if ($query->have_posts()) : ?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
        <article>
            <?php if (has_post_thumbnail()) : ?>
                <figure><?php echo the_post_thumbnail(); ?></figure>
            <?php endif; ?>
            <h2>
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h2>
        </article>
    <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
