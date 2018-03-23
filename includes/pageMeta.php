<?php
/* ----------------------------------------------------------------------------------- */
# Create post_type
/* ----------------------------------------------------------------------------------- */
$page_meta_box = array(
    'id' => 'post-meta-box',
    'title' => 'Thông tin trang',
    'page' => 'page',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Mã nhúng',
            'desc' => 'Thêm mã',
            'id' => 'page_code',
            'type' => 'textarea',
            'std' => ''
        ),
));

// Add post meta box
if(is_admin()){
    add_action('admin_menu', 'page_add_box');
    add_action('save_post', 'page_add_box');
    add_action('save_post', 'page_save_data');
}

function page_add_box(){
    global $page_meta_box;
    add_meta_box($page_meta_box['id'], $page_meta_box['title'], 'page_show_box', $page_meta_box['page'], $page_meta_box['context'], $page_meta_box['priority']);
}

function page_show_box() {
    // Use nonce for verification
    global $page_meta_box, $post;
    custom_output_meta_box($page_meta_box, $post);
}

// Save data from post meta box
function page_save_data($post_id) {
    global $page_meta_box;
    custom_save_meta_box($page_meta_box, $post_id);
}
