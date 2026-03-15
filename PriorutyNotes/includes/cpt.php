<?php

function pn_register_notes_cpt() {

    $labels = array(
        'name' => 'Notes',
        'singular_name' => 'Note',
        'add_new' => 'Add Note',
        'add_new_item' => 'Add New Note',
        'edit_item' => 'Edit Note',
        'new_item' => 'New Note',
        'view_item' => 'View Note',
        'search_items' => 'Search Notes',
        'not_found' => 'No notes found'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'supports' => array('title','editor','author','thumbnail'),
        'has_archive' => true,
        'menu_icon' => 'dashicons-edit'
    );

    register_post_type('pn_note', $args);
}

add_action('init', 'pn_register_notes_cpt');