<?php
/**
 * The template for displaying the footer
 */
?>

    </div><!-- .site-content -->

    <!-- <div data-component="Example" label="Count">Bezig met laden...</div> -->

    <footer class="site-footer">
        <div class="container">
            <img src="<?= get_field('footer_logo', 'options') ?>" alt="" class="footer-logo"/>
            <nav class="footer-menu">
                <h3>Footer menu</h3>
                <?php wp_nav_menu(array('theme_location' => 'footer_menu')) ?>
            </nav>
        </div>
    </footer>

</div><!-- #site-container -->

<?php wp_footer(); ?>

</body>
</html>
