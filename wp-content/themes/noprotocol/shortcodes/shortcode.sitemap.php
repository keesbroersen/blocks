<?php
// phpcs:disable PSR1.Files.SideEffects

function sitemap_sc($atts, $content = null)
{
    ob_start();
    $atts = shortcode_atts(array(), $atts, 'sitemap_tmmt');
    $sitemap = get_field('sitemap', 'options'); ?>

    <div class="container sitemap-block">
        <div class="row">
            <ul class="sitemap-list">
                <?php foreach ($sitemap as $link) : ?>
                    <li class="link-level-one col-four <?= $link['tweede_niveau'] ? 'has-children' : '' ?>">
                        <a href="<?= $link['pagina_link'] ?>"
                           style="color: <?= $link['kleur'] ?>"><?= $link['pagina_naam'] ?></a>
                        <?php if ($link['tweede_niveau']) : ?>
                            <ul>
                                <?php foreach ($link['tweede_niveau'] as $deep_link) :?>
                                    <li>
                                        <a href="<?= $deep_link['pagina_link'] ?>"><?= $deep_link['pagina_naam'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
    <?php

    $output_string = ob_get_contents();
    ob_end_clean();

    return $output_string;
}

add_shortcode('sitemap_tmmt', 'sitemap_sc');
?>
