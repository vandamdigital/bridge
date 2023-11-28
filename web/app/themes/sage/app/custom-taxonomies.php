<?php

/**
 * Add custom taxonomies
 */

namespace App;

function create_my_custom_taxonomies()
{
    // register_taxonomy('cases-category', 'cases', array(
    //     'hierarchical' => true,
    //     'labels' => array(
    //         'name' => _x('Categorie'),
    //         'singular_name' => _x('Categorie'),
    //         'search_items' => __('Zoek categorieen'),
    //         'all_items' => __('Alle categorieen'),
    //         'parent_item' => __('Parent categorie'),
    //         'parent_item_colon' => __('Parent categorie:'),
    //         'edit_item' => __('Categorie wijzigingen'),
    //         'update_item' => __('Categorie wijzigingen'),
    //         'add_new_item' => __('Categorie toevoegen'),
    //         'new_item_name' => __('Categorie toevoegen'),
    //         'menu_name' => __('Categorie'),
    //     ),
    //     'show_ui' => true,
    //     'show_in_rest' => true,
    //     'show_admin_column' => true,
    //     'query_var' => true,
    //     'rewrite' => array('slug' => 'category'),
    // ));

    flush_rewrite_rules(false);
}

add_action('init', __NAMESPACE__ . '\\create_my_custom_taxonomies');
