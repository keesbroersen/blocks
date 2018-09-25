<?php
get_header();
?>

<main class="page-default no-header" role="main">


    <div class="container">
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <h2><?php the_title(); ?></h2>
            <?php the_content() ?>
        <?php endwhile; ?>
    </div>

    <?php get_template_part('./_contentblocks/contentblocks'); ?>


</main>


<?php
get_footer();
