<?php

/**
 * Courses Menu Page
 */

# Custom courses post type
add_action('init', 'create_courses_post_type');

function create_courses_post_type(){
    register_post_type('courses', array(
        'labels' => array(
            'name' => __('Courses'),
            'singular_name' => __('Courses'),
            'add_new' => __('Add new'),
            'add_new_item' => __('Add new Course'),
            'new_item' => __('New Course'),
            'edit' => __('Edit'),
            'edit_item' => __('Edit Course'),
            'view' => __('View Course'),
            'view_item' => __('View Course'),
            'search_items' => __('Search Courses'),
            'not_found' => __('No Course found'),
            'not_found_in_trash' => __('No Course found in trash'),
        ),
        'public' => true,
        'show_ui' => true,
        'publicy_queryable' => true,
        'exclude_from_search' => false,
        'menu_position' => 5,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt',
            //'comments', 'author', 'custom-fields',
        ),
        'rewrite' => array('slug' => 'courses', 'with_front' => false),
        'can_export' => true,
        'description' => __('Course description here.')
    ));
}

# Custom courses taxonomies
add_action('init', 'create_courses_taxonomies');

function create_courses_taxonomies(){
    register_taxonomy('courses_category', 'courses', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __('Course Categories'),
            'singular_name' => __('Course Categories'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Category'),
            'new_item' => __('New Category'),
            'search_items' => __('Search Categories'),
        ),
    ));
}

# courses meta box
$courses_meta_box = array(
    'id' => 'courses-meta-box',
    'title' => 'Thông tin',
    'page' => 'courses',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Nổi bật',
            'desc' => 'Đánh dấu nổi bật nếu muốn hiển thị ở trang chủ',
            'id' => 'is_most',
            'type' => 'radio',
            'std' => '',
            'options' => array(
                '1' => 'Yes',
                '0' => 'No'
            )
        ),
        array(
            'name' => 'Mã nhúng',
            'desc' => 'Mã nhúng',
            'id' => 'c_code',
            'type' => 'textarea',
            'std' => ''
        ),
));
$area_fields = array(
    array(
        'name' => 'course_field[0]',
        'desc' => '',
        'id' => 'Tiêu đề 1',
        'type' => 'textarea',
        'std' => '',
    ),
);

// Add courses meta box
if(is_admin()){
    add_action('admin_menu', 'courses_add_box');
    add_action('save_post', 'courses_add_box');
    add_action('save_post', 'courses_save_data');
}

function courses_add_box(){
    global $courses_meta_box;
    add_meta_box($courses_meta_box['id'], $courses_meta_box['title'], 'courses_show_box', $courses_meta_box['page'], $courses_meta_box['context'], $courses_meta_box['priority']);
}

// Callback function to show fields in courses meta box
function courses_show_box() {
    // Use nonce for verification
    global $area_fields, $courses_meta_box, $post;
    
    custom_output_meta_box($courses_meta_box, $post);

    // Use nonce for verification
    echo '<input type="hidden" name="courses_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo <<<HTML
    <style type="text/css">
        .wp_themeSkin iframe{background: #FFFFFF;}
    </style>
HTML;
    echo '<table width="100%" id="tblCourse">';
    
    $course_field = get_post_meta($post->ID, 'course_field', true);
    $course_jsondecode = array();
    if($course_field)
        $course_jsondecode = json_decode($course_field);

    if($course_field && !empty($course_jsondecode)){
        for ($i = 0; $i < count($course_jsondecode[0]); $i++) :
            echo '<tr id="col-', $i, '"><td>';
            echo "<p><input type=\"text\" name=\"course_field[", $i, "]\" value=\"", $course_jsondecode[0][$i], "\" style=\"width:99%\" /></p>";
//            wp_editor($course_jsondecode[1][$i], "area_course_field[". $i. "]", array(
            wp_editor($course_jsondecode[1][$i], "area_course_field_". $i. "", array(
                'textarea_name' => "area_course_field[". $i. "]",
                'tinymce' => array(
                    "textarea_rows" => 5
                )
            ));
            if($i > 0)
                echo '<p><input type="button" class="button" name="btnDel_', $i ,'" value="Xoá" /></p>';
            echo '<td></tr>';
        endfor;
    }else{
        foreach ($area_fields as $key => $field) :
            $meta = get_post_meta($post->ID, $field['id'], true);

            echo '<tr id="col-0"><td>';
            echo "<p><input type=\"text\" name=\"{$field['name']}\" value=\"{$field['id']}\" style=\"width:99%\" /></p>";
            wp_editor($meta, "area_" . substr($field['name'], 0, strlen($field['name']) - 3) . "_" . $key, array(
                'textarea_name' => "area_" . $field['name'],
                'tinymce' => array(
                    "textarea_rows" => 5
                )
            ));
            echo '<td></tr>';
        endforeach;
    }
    echo '</table>';
    echo '<p><input type="button" class="button" id="btnNewCF" value="Thêm thuộc tính" /></p>';
}

// Save data from courses meta box
function courses_save_data($post_id) {
    global $courses_meta_box;
    
    custom_save_meta_box($courses_meta_box, $post_id);
    
    // verify nonce
    if (!wp_verify_nonce($_POST['courses_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    
    $fields = $_POST["course_field"];
    $contents = $_POST["area_course_field"];
    $i = 0;
    foreach ($fields as $k => $v) {
        unset($fields[$k]);
        $fields[$i] = $v;
        $i++;
    }
    $j = 0;
    foreach ($contents as $k => $v) {
        unset($contents[$k]);
        $v = preg_replace('!\r!', "\\r", $v);
        $v = preg_replace('!\n!', "\\n", $v);
        $v = preg_replace('!\t!', "\\t", $v);
        $contents[$j] = $v;
        $j++;
    }
    $val = json_encode(array($fields, $contents), JSON_UNESCAPED_UNICODE);
    
    update_post_meta($post_id, 'course_field', $val);
}

/***************************************************************************/
// ADD NEW COLUMN  
function courses_columns_head($defaults) {
    $defaults['is_most'] = 'Nổi bật';
    return $defaults;
}

// SHOW THE COLUMN
function courses_columns_content($column_name, $post_id) {
    if ($column_name == 'is_most') {
        $is_most = get_post_meta( $post_id, 'is_most', true );
        if($is_most == 1){
            echo '<a href="edit.php?update_is_most=true&post_id=' . $post_id . '&is_most=' . $is_most . '&redirect_to=' . urlencode(getCurrentRquestUrl()) . '">Yes</a>';
        }else{
            echo '<a href="edit.php?update_is_most=true&post_id=' . $post_id . '&is_most=' . $is_most . '&redirect_to=' . urlencode(getCurrentRquestUrl()) . '">No</a>';
        }
    }
}

// Update is most stataus
function update_courses_is_most(){
    if(getRequest('update_is_most') == 'true'){
        $post_id = getRequest('post_id');
        $is_most = getRequest('is_most');
        $redirect_to = urldecode(getRequest('redirect_to'));
        if($is_most == 1){
            update_post_meta($post_id, 'is_most', 0);
        }else{
            update_post_meta($post_id, 'is_most', 1);
        }
        header("location: $redirect_to");
        exit();
    }
}

add_filter('manage_courses_posts_columns', 'courses_columns_head');  
add_action('manage_courses_posts_custom_column', 'courses_columns_content', 10, 2);  
add_filter('admin_init', 'update_courses_is_most');  

### Sortatble columns

function sortable_courses_is_most_column( $columns ) {  
    $columns['is_most'] = 'is_most';  
  
    //To make a column 'un-sortable' remove it from the array  
    //unset($columns['date']);  
  
    return $columns;  
}

function courses_is_most_orderby( $query ) {  
    if( ! is_admin() )  
        return;  
  
    $orderby = $query->get( 'orderby');  
  
    if( 'is_most' == $orderby ) {  
        $query->set('meta_key','is_most');  
        $query->set('orderby','meta_value_num');  
    }  
}

add_filter( 'manage_edit-courses_sortable_columns', 'sortable_courses_is_most_column' );  
add_action( 'pre_get_posts', 'courses_is_most_orderby' );