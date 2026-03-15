<?php

function pn_notes_shortcode($atts) {

    $atts = shortcode_atts(array(
        'priority' => '',
        'before_date' => ''
    ), $atts);

    $args = array(
        'post_type' => 'pn_note',
        'posts_per_page' => -1
    );

    if ($atts['priority']) {

        $args['tax_query'] = array(
            array(
                'taxonomy' => 'priority',
                'field' => 'slug',
                'terms' => $atts['priority']
            )
        );
    }

    if ($atts['before_date']) {

        $args['meta_query'] = array(
            array(
                'key' => '_pn_due_date',
                'value' => $atts['before_date'],
                'compare' => '<=',
                'type' => 'DATE'
            )
        );
    }

    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        return "Нет заметок с заданными параметрами";
    }

    $output = '<ul class="pn-notes">';

    while ($query->have_posts()) {

        $query->the_post();

        $date = get_post_meta(get_the_ID(), '_pn_due_date', true);

        $output .= '<li>';
        $output .= '<strong>'.get_the_title().'</strong>';
        $output .= '<br><small>Due: '.$date.'</small>';
        $output .= '</li>';
    }

    $output .= '</ul>';

    wp_reset_postdata();

    return $output;
}

add_shortcode('priority_notes', 'pn_notes_shortcode');


function pn_add_note_form() {

    if(!is_user_logged_in()){
        return "<p style='color:red;'>You must be logged in to add notes.</p>";
    }

    ob_start();

    // Если есть сообщение об ошибке, выводим
    if(isset($_POST['pn_submit_note'])){

        $due_date = $_POST['pn_due_date'];
        $today = date('Y-m-d');

        if($due_date < $today){
            echo "<p style='color:red;'>Ошибка: дата напоминания не может быть в прошлом.</p>";
        } else {
            $post_id = wp_insert_post(array(
                'post_title' => sanitize_text_field($_POST['pn_title']),
                'post_content' => sanitize_textarea_field($_POST['pn_content']),
                'post_status' => 'publish',
                'post_type' => 'pn_note'
            ));

            if($post_id){
                update_post_meta($post_id,'_pn_due_date',$due_date);
                wp_set_object_terms($post_id,$_POST['pn_priority'],'priority');
                echo "<p style='color:green;'>Заметка успешно добавлена!</p>";
            }
        }
    }
    ?>

    <form method="post" class="pn-note-form">
        <input type="text" name="pn_title" placeholder="Title" required>
        <textarea name="pn_content" placeholder="Content"></textarea>
        <input type="date" name="pn_due_date" required>
        <select name="pn_priority">
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
        </select>
        <input type="submit" name="pn_submit_note" value="Add Note">
    </form>

    <?php
    return ob_get_clean();
}

add_shortcode('add_priority_note','pn_add_note_form');