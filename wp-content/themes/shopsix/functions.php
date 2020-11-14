<?php
define('TPL_DIR_URI', get_template_directory_uri());
//add css files
function svh_enqueue_styles()
{
    wp_enqueue_style('bootstrap', TPL_DIR_URI . '/assets/vendors/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome'.TPL_DIR_URI.'/assets/fontawesome/css/all.min.css');
    wp_enqueue_style('core', TPL_DIR_URI . '/style.css');
}
add_action('wp_enqueue_scripts', 'svh_enqueue_styles');


// add js files
function svh_enqueue_scripts()
{
    wp_enqueue_script('popper', TPL_DIR_URI .
        '/assets/vendor/popper/popper.min.js', ['jquery']);
    wp_enqueue_script('bootstrap', TPL_DIR_URI .
        '/assets/vendor/bootstrap/js/bootstrap.min.js', ['jquery']);
        wp_enqueue_script('fontawesome', TPL_DIR_URI .
        '/assets/fontawesome/js/all.min.js', ['jquery']);
}
add_action('wp_enqueue_scripts', 'svh_enqueue_scripts');
