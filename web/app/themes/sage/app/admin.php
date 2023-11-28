<?php

/**
 * Theme admin.
 */

namespace App;

use WP_Customize_Manager;

/**
 * Register the `.brand` selector to the blogname.
 *
 * @param \WP_Customize_Manager $wp_customize
 *
 * @return void
 */
add_action('customize_register', function (WP_Customize_Manager $wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector'        => '.navbar__brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Allow svg upload
 */
add_filter('upload_mimes', function ($allowed) {
    if (!current_user_can('manage_options')) {
        return $allowed;
    }
    $allowed['svg'] = 'image/svg+xml';
    return $allowed;
});

/**
 * Login styling
 */
// function custom_admin_style() {
//     // wp_enqueue_style('sage/admin.css', asset_path('styles/admin.css'), false, null);
//     wp_register_style( 'my-stylesheet', 'https://www.enabldigital.com/login-style/wp-login.css' );
//     wp_enqueue_style( 'my-stylesheet' );
//  }
//  add_action('admin_enqueue_scripts',  __NAMESPACE__ . '\\custom_admin_style');
//  add_action('login_enqueue_scripts', __NAMESPACE__ . '\\custom_admin_style' );
