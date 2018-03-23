<?php
/**
 * Custom photo post type
 */

add_action('init', 'create_photo_post_type');

function create_photo_post_type(){
    register_post_type('photo', array(
        'labels' => array(
            'name' => __('Photos'),
            'singular_name' => __('Photos'),
            'add_new' => __('Add new'),
            'add_new_item' => __('Add new Photo'),
            'new_item' => __('New Photo'),
            'edit' => __('Edit'),
            'edit_item' => __('Edit Photo'),
            'view' => __('View Photo'),
            'view_item' => __('View Photo'),
            'search_items' => __('Search Photos'),
            'not_found' => __('No Photo found'),
            'not_found_in_trash' => __('No Photo found in trash'),
        ),
        'public' => true,
        'show_ui' => true,
        'publicy_queryable' => true,
        'exclude_from_search' => false,
        'menu_position' => 5,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => array(
            'title', 'editor', 'author', 'thumbnail',
            //'custom-fields', 'comments', 'excerpt',
        ),
        'rewrite' => array('slug' => 'photo', 'with_front' => false),
        'can_export' => true,
        'description' => __('Photo description here.')
    ));
}

# Custom photo taxonomies
/*add_action('init', 'create_photo_taxonomies');

function create_photo_taxonomies(){
    register_taxonomy('photo_category', 'photo', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __('Photo Categories'),
            'singular_name' => __('Photo Categories'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Category'),
            'new_item' => __('New Category'),
            'search_items' => __('Search Categories'),
        ),
    ));
}*/

// Add photo meta box
if(is_admin()){
    add_action('admin_menu', 'photo_add_box');
    add_action('save_post', 'photo_add_box');
    add_action('save_post', 'photo_save_data');
}

# photo meta box
$photo_meta_box = array(
    'id' => 'photo-meta-box',
    'title' => 'Thông tin về lịch học',
    'page' => 'photo',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Mô tả về album',
            'desc' => 'Mô tả về album',
            'id' => 'photo_des',
            'type' => 'textarea',
            'std' => '',
            'editor' => false,
        ),
));


function photo_add_box(){
    global $photo_meta_box;
    add_meta_box($photo_meta_box['id'], $photo_meta_box['title'], 'photo_show_box', $photo_meta_box['page'], $photo_meta_box['context'], $photo_meta_box['priority']);
}

// Callback function to show fields in photo meta box
function photo_show_box() {
    // Use nonce for verification
    global $photo_meta_box, $post;

    custom_output_meta_box($photo_meta_box, $post);
}

// Save data from photo meta box
function photo_save_data($post_id) {
    global $photo_meta_box;
    custom_save_meta_box($photo_meta_box, $post_id);
}