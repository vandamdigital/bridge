<?php

/**
 * Register custom post type
 */

namespace App;

add_action('init', function () {
    // register_post_type('cases', array(
    //     'labels' => array(
    //         'name' => __('Cases'),
    //         'singular_name' => __('Case'),
    //         'menu_name' => __('Cases'),
    //         'name_admin_bar' => __('Referenties'),
    //         'all_items' => __( 'Alle cases'),
    //         'add_new_item' => __( 'Case toevoegen'),
    //         'add_new' => __( 'Case toevoegen'),
    //         'new_item' => __( 'Case toevoegen'),
    //         'edit_item' => __( 'Case wijzigingen'),
    //         'update_item' => __( 'Case wijzigingen'),
    //         'view_item' => __( 'Case bekijken'),
    //         'view_items' => __( 'Case bekijken'),
    //     ),
    //     'description' => 'Cases',
    //     'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes'),
    //     'show_in_menu' => true,
    //     'menu_icon' => 'dashicons-grid-view',
    //     'show_in_admin_bar' => true,
    //     'can_export' => true,
    //     'hierarchical' => true,
    //     'capability_type' => 'page',
    //     'public' => false,
    //     'publicly_queryable' => true,
    //     'show_ui' => true,
    //     'exclude_from_search' => true,
    //     'show_in_nav_menus' => false,
    //     'has_archive' => false,
    //     'rewrite' => array(
    //         'slug' => 'cases',
    //         'with_front' => true
    //     ),
    // ));

    flush_rewrite_rules(true);
});
