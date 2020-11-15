<?php
define('TPL_DIR_URI', get_template_directory_uri());
//add css files
function svh_enqueue_styles()
{
    wp_enqueue_style('bootstrap', TPL_DIR_URI . '/assets/vendors/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome' . TPL_DIR_URI . '/assets/fontawesome/css/all.min.css');
    wp_enqueue_style('splide', TPL_DIR_URI . '/assets/css/splide.min.css');
    // -----------
    wp_enqueue_style('header', TPL_DIR_URI . '/assets/css/header.css');
    // ---------------
    wp_enqueue_style('core', TPL_DIR_URI . '/style.css');
}
add_action('wp_enqueue_scripts', 'svh_enqueue_styles');


// add js files
function svh_enqueue_scripts()
{
    wp_enqueue_script('popper', TPL_DIR_URI .
        '/assets/vendors/popper/popper.min.js', ['jquery'],'1.2',true);
    wp_enqueue_script('bootstrap', TPL_DIR_URI .
        '/assets/vendors/bootstrap/js/bootstrap.min.js', ['jquery'], true, true);
    wp_enqueue_script('fontawesome', TPL_DIR_URI .
        '/assets/fontawesome/js/all.min.js', ['jquery'], true, true);
    wp_enqueue_script('splide', TPL_DIR_URI .
        '/assets/js/splide.min.js', ['jquery'], true, true);
    wp_enqueue_script('apps', TPL_DIR_URI .
        '/assets/js/apps.js', ['jquery'], true, true);
}
add_action('wp_enqueue_scripts', 'svh_enqueue_scripts');
