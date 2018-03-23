<?php
/**
 * Custom scheduling post type
 */

add_action('init', 'create_scheduling_post_type');

function create_scheduling_post_type(){
    register_post_type('scheduling', array(
        'labels' => array(
            'name' => __('Lịch Học'),
            'singular_name' => __('Lịch Học'),
            'add_new' => __('Add new'),
            'add_new_item' => __('Thêm mới lịch học'),
            'new_item' => __('Thêm mới lịch học'),
            'edit' => __('Edit'),
            'edit_item' => __('Edit Lịch học'),
            'view' => __('Xem lịch học'),
            'view_item' => __('Xem lịch học'),
            'search_items' => __('Search lịch học'),
            'not_found' => __('Không có lịch học'),
            'not_found_in_trash' => __('Không có lịch học nào ở Trash'),
        ),
        'public' => false,
        'show_ui' => true,
        'publicy_queryable' => true,
        'exclude_from_search' => false,
        'menu_position' => 5,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => array(
            'title', 
            //'custom-fields', 'comments','editor','thumbnail', 'excerpt', 'author', 
        ),
        'rewrite' => array('slug' => 'scheduling', 'with_front' => false),
        'can_export' => true,
        'description' => __('Mô tả lịch học.')
    ));
}

// Add scheduling meta box
if(is_admin()){
    add_action('admin_menu', 'scheduling_add_box');
    add_action('save_post', 'scheduling_add_box');
    add_action('save_post', 'scheduling_save_data');
}

# scheduling meta box
$scheduling_meta_box = array(
    'id' => 'scheduling-meta-box',
    'title' => 'Thông tin về lịch học',
    'page' => 'scheduling',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Ngày khai giảng',
            'desc' => 'Ngày khai giảng (dd/MM/yyyy)',
            'id' => 'scheduling_date',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Lịch học',
            'desc' => 'Dạng (3-5-7)',
            'id' => 'scheduling_schedu',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Thời lượng',
            'desc' => 'Dạng 7AM - 9AM ( 12 tiết )',
            'id' => 'scheduling_thoiluong',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Link đăng ký',
            'desc' => 'Link đến bài viết hoặc form đăng ký',
            'id' => 'scheduling_link',
            'type' => 'text',
            'std' => '',
        ),
        array(
            'name' => 'Nổi bật',
            'desc' => 'Đánh dấu nổi bật nếu muốn hiển thị box trong bài viết',
            'id' => 'is_most',
            'type' => 'radio',
            'std' => '',
            'options' => array(
                '1' => 'Yes',
                '0' => 'No'
            )
        ),
));


function scheduling_add_box(){
    global $scheduling_meta_box;
    add_meta_box($scheduling_meta_box['id'], $scheduling_meta_box['title'], 'scheduling_show_box', $scheduling_meta_box['page'], $scheduling_meta_box['context'], $scheduling_meta_box['priority']);
}

// Callback function to show fields in scheduling meta box
function scheduling_show_box() {
    // Use nonce for verification
    global $scheduling_meta_box, $post;

    custom_output_meta_box($scheduling_meta_box, $post);
}

// Save data from scheduling meta box
function scheduling_save_data($post_id) {
    global $scheduling_meta_box;
    custom_save_meta_box($scheduling_meta_box, $post_id);
}

/***************************************************************************/
// ADD NEW COLUMN  
function scheduling_columns_head($defaults) {
    $defaults['is_most'] = 'Nổi bật';
    return $defaults;
}

// SHOW THE COLUMN
function scheduling_columns_content($column_name, $post_id) {
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
function update_scheduling_is_most(){
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

add_filter('manage_scheduling_posts_columns', 'scheduling_columns_head');  
add_action('manage_scheduling_posts_custom_column', 'scheduling_columns_content', 10, 2);  
add_filter('admin_init', 'update_scheduling_is_most');  

### Sortatble columns

function sortable_scheduling_is_most_column( $columns ) {  
    $columns['is_most'] = 'is_most';  
  
    //To make a column 'un-sortable' remove it from the array  
    //unset($columns['date']);  
  
    return $columns;  
}

function scheduling_is_most_orderby( $query ) {  
    if( ! is_admin() )  
        return;  
  
    $orderby = $query->get( 'orderby');  
  
    if( 'is_most' == $orderby ) {  
        $query->set('meta_key','is_most');  
        $query->set('orderby','meta_value_num');  
    }  
}

add_filter( 'manage_edit-scheduling_sortable_columns', 'sortable_scheduling_is_most_column' );  
add_action( 'pre_get_posts', 'scheduling_is_most_orderby' );  