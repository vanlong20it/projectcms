<?php

/**
 * Plugin Name: Text Plugin
 * Author: nhom6
 * Version: 1.0.0
 */
function loadMyBlock()
{
    wp_enqueue_script(
        'my-new-block',
        plugin_dir_url(__FILE__) . 'text-block.js',
        array('wp-blocks', 'wp-editor'),
        true
    );
}
add_action('enqueue_block_editor_assets', 'loadMyBlock');
