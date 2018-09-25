<?php

$title = get_the_archive_title();

get_header(); ?>

<section class="archive-page container post-preview-container">
    <div class="post-preview-header">
        <h3 class="theme-header"><?= str_replace('Category:', '', $title) ?></h3>
    </div>

    <?php if (have_posts()) : ?>
        <div class="row">
        <?php while (have_posts()) :?>
            <?php the_post() ?>
            <?php get_template_part('components/post_view') ?>
        <?php endwhile ?>

    <?php else :// If no content, include the "No posts found" template. ?>
        </div>

    <?php endif; ?>

</section>

<?php
get_footer();
