<?php

get_header();

?>
<main class="page-default no-header type-404" role="main">

    <section class="container">

        <h1>404</h1>
        <p><?= get_field('text_404', 'options') ?></p>

    </section>
</main>


<?php get_footer(); ?>
