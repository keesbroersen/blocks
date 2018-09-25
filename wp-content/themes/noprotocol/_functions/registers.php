<?php

/* Custom Post Types
============================================================================== */
/* CPT News */
function register_news()
{
    $labels = array(
        'name'               => 'Nieuws',
        'singular_name'      => 'Nieuws',
        'add_new'            => 'Nieuw Nieuwsartikel',
        'add_new_item'       => 'Nieuw Nieuwsartikel toevoegen',
        'edit_item'          => 'Bewerk Nieuwsartikel',
        'new_item'           => 'Nieuw Nieuwsartikel',
        'all_items'          => 'Alle Nieuwsartikelen',
        'view_item'          => 'Bekijk Nieuwsartikel',
        'search_items'       => 'Zoek Nieuws',
        'not_found'          => 'Geen Nieuws gevonden',
        'not_found_in_trash' => 'Geen Nieuws gevonden in de prullenmand',
        'parent_item_colon'  => '',
        'menu_name'          => 'Nieuws'
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array(
            'slug' => 'nieuws'
        ),
        'capability_type'    => 'page',
        'has_archive'        => false,
        'menu_icon'   => 'dashicons-admin-site',
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes', 'excerpt' ),
        'taxonomies'         => array(''),
    );
    register_post_type('news', $args);
}

function register_all_taxonomies()
{
    $taxonomies = array(
        array(
            'slug'         => 'categorieen',
            'single_name'  => 'Category',
            'plural_name'  => 'Categorieen',
            'post_type'    => 'news',
            'rewrite'      => array( 'slug' => 'nieuws/categorieen' , 'with_front' => false ),
        )
    );
    foreach ($taxonomies as $taxonomy) {
        $labels = array(
            'name' => $taxonomy['plural_name'],
            'singular_name' => $taxonomy['single_name'],
            'search_items' =>  'Search ' . $taxonomy['plural_name'],
            'all_items' => 'All ' . $taxonomy['plural_name'],
            'parent_item' => 'Parent ' . $taxonomy['single_name'],
            'parent_item_colon' => 'Parent ' . $taxonomy['single_name'] . ':',
            'edit_item' => 'Edit ' . $taxonomy['single_name'],
            'update_item' => 'Update ' . $taxonomy['single_name'],
            'add_new_item' => 'Add New ' . $taxonomy['single_name'],
            'new_item_name' => 'New ' . $taxonomy['single_name'] . ' Name',
            'menu_name' => $taxonomy['plural_name']
        );

        $rewrite = isset($taxonomy['rewrite']) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
        $hierarchical = isset($taxonomy['hierarchical']) ? $taxonomy['hierarchical'] : true;

        register_taxonomy($taxonomy['slug'], $taxonomy['post_type'], array(
            'hierarchical' => $hierarchical,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'show_in_nav_menus' => true,
            'public' => true,
            'rewrite' => $rewrite,
        ));
    }
}
// add_action( 'init', 'register_all_taxonomies' );
// add_action( 'init', 'register_news' );
