<?php

get_header() ?>

<main class="page-default no-header" role="main">

    <div class="container">
        <?php while (have_posts()) :?>
            <?php the_post() ?>
            <h2><?php the_title() ?></h2>
            <p><?= get_the_content() ?></p>
        <?php endwhile ?>
    </div>

</main>

<?php
get_footer();
