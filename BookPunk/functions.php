<?php

require get_template_directory() . '/inc/theme-setup.php';

function bookpunk_enqueue_assets(){

    wp_enqueue_style(
        'bookpunk-style',
        get_template_directory_uri().'/assets/css/style.css',
        [],
        '1.0'
    );

    wp_enqueue_script(
        'bookpunk-js',
        get_template_directory_uri().'/assets/js/main.js',
        [],
        '1.0',
        true
    );

}

add_action('wp_enqueue_scripts','bookpunk_enqueue_assets');