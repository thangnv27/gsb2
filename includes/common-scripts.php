<?php
/* ----------------------------------------------------------------------------------- */
# Register main Scripts and Styles
/* ----------------------------------------------------------------------------------- */
add_action('admin_enqueue_scripts', 'ppo_register_scripts');

function ppo_register_scripts(){
    wp_enqueue_media();
    
    ## Register All Styles
    wp_register_style('chosen-template', get_template_directory_uri() . '/css/chosen.min.css');
    wp_register_style('colorpicker-template', get_template_directory_uri() . '/css/colorpicker.css');
    
    wp_enqueue_style('chosen-template');
    wp_enqueue_style('colorpicker-template');
    
    ## Register All Scripts
    wp_register_script(SHORT_NAME . '-chosen', get_template_directory_uri() . '/js/adminjs/chosen.jquery.min.js', array('jquery'));
    wp_register_script(SHORT_NAME . '-colorpicker', get_template_directory_uri() . '/js/adminjs/colorpicker.js', array('jquery'));
    wp_register_script(SHORT_NAME . '-md5', get_template_directory_uri() . '/js/jquery.md5.min.js', array('jquery'));
    wp_register_script(SHORT_NAME . '-scripts', get_template_directory_uri() . '/js/adminjs/scripts.js', array('jquery'));

    ## Get Global Scripts
    wp_enqueue_script(SHORT_NAME . '-chosen');
    wp_enqueue_script(SHORT_NAME . '-colorpicker');
    wp_enqueue_script(SHORT_NAME . '-md5');
    wp_enqueue_script(SHORT_NAME . '-scripts');
}