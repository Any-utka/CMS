<?php

function pn_add_due_date_metabox() {

    add_meta_box(
        'pn_due_date',
        'Due Date',
        'pn_due_date_callback',
        'pn_note',
        'side'
    );

}

add_action('add_meta_boxes', 'pn_add_due_date_metabox');

// Callback function to display the due date field

function pn_due_date_callback($post) {

    wp_nonce_field('pn_save_due_date','pn_due_nonce');

    $value = get_post_meta($post->ID, '_pn_due_date', true);

    echo '<input type="date" name="pn_due_date" value="'.esc_attr($value).'" required />';
}

// Save the due date when the note is saved

function pn_save_due_date($post_id) {

    if (!isset($_POST['pn_due_nonce'])) return;

    if (!wp_verify_nonce($_POST['pn_due_nonce'], 'pn_save_due_date')) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['pn_due_date'])) {

        $date = sanitize_text_field($_POST['pn_due_date']);

        if (strtotime($date) < strtotime(date('Y-m-d'))) {
            return;
        }

        update_post_meta($post_id, '_pn_due_date', $date);
    }
}

add_action('save_post', 'pn_save_due_date');