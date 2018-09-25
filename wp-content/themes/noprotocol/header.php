<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">
<head>
    <title><?= wp_title() ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="site_container">
    <header class="main-header">
        <div class="container">
            <div class="main-logo">
                <a href="<?= get_home_url() ?>">
                    <img src="<?= get_field('main_logo', 'options') ?>" alt="Main logo"/>
                </a>
            </div>
            <div class="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <nav class="main-nav">
                <?= wp_nav_menu(array(
                        'menu' => 'Main menu'
                )) ?>

            </nav>
            <form role="search" method="get" id="searchform" class="searchform" action="<?= get_home_url() ?>">
                <div>
                    <input type="text" value="<?= get_search_query() ?: '' ?>" name="s" id="s" placeholder="zoekterm">
                    <button id="searchsubmit"></button>
                </div>
            </form>
        </div>
    </header>

    <div id="content" class="site-content">
