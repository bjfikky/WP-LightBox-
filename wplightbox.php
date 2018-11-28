<?php

/*
Plugin Name: LightBox
Description: Used to create an images lightbox
Version: 1.0
Author: Benjamin Orimoloye
Author URI: http://benorim.com
*/

add_action('admin_menu', 'wplightbox_menu');

function wplightbox_menu()
{
    add_menu_page(
        'LightBox',
        'LightBox',
        'manage_options',
        'wplightbox',
        'wplightbox_menu_page'
    );
}


function wplightbox_menu_page()
{
    if (! current_user_can('manage_options') )
    {
        wp_die("You do not have sufficient permissions to access this page");
    }

    require('inc/lightbox-guide.php');
}


function wplightbox_frontend_styles()
{
    wp_enqueue_style( 'wplightbox_frontend_css', plugins_url('wplightbox/wplightbox.css') );
}

add_action('wp_enqueue_scripts', 'wplightbox_frontend_styles');


function wplightbox_frontend($atts)
{
    require('inc/lightbox-template.php');
}

add_shortcode( 'foobar', 'wplightbox_frontend');

