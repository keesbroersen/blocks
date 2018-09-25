<?php
get_header() ?>

<main class="single-post single-default">
    <?php while (have_posts()) : ?>
        <?php the_post() ?>
        <div class="container content-section type-single">

            <div class="meta">
                <div class="post-date">
                    <?= get_the_date() ?>
                </div>
            </div>
            <h2><?= the_title() ?></h2>

            <div class="post-content">
                <div class="excerpt">
                    <?php the_excerpt() ?>
                </div>
                <div class="content">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
    <?php endwhile ?>
</main>

<?php
get_footer();
