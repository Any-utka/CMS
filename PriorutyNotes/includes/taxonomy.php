<?php

function pn_register_priority_taxonomy() {

    $labels = array(
        'name' => 'Priorities',
        'singular_name' => 'Priority',
        'search_items' => 'Search Priorities',
        'all_items' => 'All Priorities',
        'edit_item' => 'Edit Priority',
        'update_item' => 'Update Priority',
        'add_new_item' => 'Add New Priority',
        'new_item_name' => 'New Priority'
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true
    );

    register_taxonomy('priority', 'pn_note', $args);
}

add_action('init', 'pn_register_priority_taxonomy');