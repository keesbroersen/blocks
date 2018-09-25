<?php

function tmmt_get_menu_items($menu_name)
{
    if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        return wp_get_nav_menu_items($menu->term_id);
    } else {
        return null;
    }
}
