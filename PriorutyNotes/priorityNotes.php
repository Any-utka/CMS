<?php
/*
Plugin Name: Priority Notes
Description: Plugin for notes with priority and reminder date
Version: 1.0
Author: Doten Anna
*/

if (!defined('ABSPATH')) {
    exit;
}

define('PN_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PN_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once PN_PLUGIN_PATH . 'includes/cpt.php';
require_once PN_PLUGIN_PATH . 'includes/taxonomy.php';
require_once PN_PLUGIN_PATH . 'includes/metabox.php';
require_once PN_PLUGIN_PATH . 'includes/shortcode.php';

function pn_enqueue_styles() {
    wp_enqueue_style('pn-style', PN_PLUGIN_URL . 'assets/style.css');
}

add_action('wp_enqueue_scripts', 'pn_enqueue_styles');