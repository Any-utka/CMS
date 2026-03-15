<?php

function bookpunk_setup(){

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    register_nav_menus([
        'main-menu' => 'Main Menu'
    ]);

}

add_action('after_setup_theme','bookpunk_setup');