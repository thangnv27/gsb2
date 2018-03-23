<?php

$basename = basename($_SERVER['PHP_SELF']);
//if (!in_array($basename, array('plugins.php', 'update.php', 'upgrade.php', 'update-core.php'))) {
//    ob_start();
//    ob_start("ob_gzhandler");
//}

/* ----------------------------------------------------------------------------------- */
# Set default timezone
/* ----------------------------------------------------------------------------------- */
date_default_timezone_set('Asia/Ho_Chi_Minh');

######## BLOCK CODE NAY LUON O TREN VA KHONG DUOC XOA ##########################
if (!defined('THEME_NAME'))
    define('THEME_NAME', "PPO");
if (!defined('SHORT_NAME'))
    define('SHORT_NAME', "ppo");
if (!defined('MENU_NAME'))
    define('MENU_NAME', SHORT_NAME . "_settings");

include 'includes/HttpFoundation/Request.php';
include 'includes/HttpFoundation/Response.php';
include 'includes/HttpFoundation/Session.php';
include 'includes/custom.php';
include 'includes/theme_functions.php';
include 'includes/common-scripts.php';
include 'includes/meta-box.php';
######## END: BLOCK CODE NAY LUON O TREN VA KHONG DUOC XOA #####################
include 'includes/class-widgets.php';
include 'includes/theme_settings.php';
include 'includes/home-options.php';
//include 'includes/scheduling.php';
//include 'includes/photo.php';
include 'includes/feedback.php';
include 'includes/courses.php';
include 'includes/shortcodes.php';
include 'ajax.php';
if (is_admin()) {
    include 'includes/postMeta.php';
    include 'includes/pageMeta.php';
//    include 'includes/ppofeedback.php';
    include 'includes/userguide.php';
    
    $basename_excludes = array('plugins.php', 'plugin-install.php', 'plugin-editor.php', 'themes.php', 'theme-editor.php', 
        'tools.php', 'import.php', 'export.php');
    if (in_array($basename, $basename_excludes)) {
        wp_redirect(admin_url());
    }

    add_action('admin_menu', 'custom_remove_menu_pages');
    add_action('admin_menu', 'remove_menu_editor', 102);
}

/**
 * Remove admin menu
 */
function custom_remove_menu_pages() {
    remove_menu_page('edit-comments.php');
    remove_menu_page('plugins.php');
    remove_menu_page('tools.php');
}

function remove_menu_editor() {
    remove_submenu_page('themes.php', 'themes.php');
    remove_submenu_page('themes.php', 'theme-editor.php');
    remove_submenu_page('plugins.php', 'plugin-editor.php');
    remove_submenu_page('options-general.php', 'options-writing.php');
    remove_submenu_page('options-general.php', 'options-discussion.php');
    remove_submenu_page('options-general.php', 'options-media.php');
}

/* ----------------------------------------------------------------------------------- */
# Setup Theme
/* ----------------------------------------------------------------------------------- */
if (!function_exists("ppo_theme_setup")) {

    function ppo_theme_setup() {
        ## Enable Links Manager (WP 3.5 or higher)
//        add_filter('pre_option_link_manager_enabled', '__return_true');
        
        ## TinyMCE tab Visual set as default
        add_filter( 'wp_default_editor', create_function('', 'return "tinymce";') );
        
        ## TinyMCE tab HTML set as default
        //add_filter( 'wp_default_editor', create_function('', 'return "html";') );

        ## Post Thumbnails
        if (function_exists('add_theme_support')) {
            add_theme_support('post-formats', array('video','image'));
            add_theme_support('post-thumbnails');
        }
        if (function_exists('add_image_size')) {
            add_image_size('image300x200', 300, 200);
        }

        ## Register menu location
        register_nav_menus(array(
            'primaryv2' => 'Primary Location v2',
            'topmenu' => 'Top Menu',
        ));
    }

}
add_action('after_setup_theme', 'ppo_theme_setup');
/* ----------------------------------------------------------------------------------- */
# Widgets init
/* ----------------------------------------------------------------------------------- */
if (!function_exists("ppo_widgets_init")) {

    function ppo_widgets_init() {
        register_sidebar(array(
            'id' => __('sidebar'),
            'name' => __('Sidebar'),
            'before_widget' => '<div id="%1$s" class="widget-container rbox %2$s">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="widget-title rbox-title"><h3>',
            'after_title' => '</h3></div><div class="rbox-content">',
        ));
        register_sidebar(array(
            'id' => __('sidebar2'),
            'name' => __('Lịch khai giảng'),
            'before_widget' => '<div id="%1$s" class="widget-container rbox %2$s">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="widget-title rbox-title"><h3>',
            'after_title' => '</h3></div><div class="rbox-content">',
        ));
        register_sidebar(array(
            'id' => __('boxmail'),
            'name' => __('Box Email'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));
    }

}

add_action('widgets_init', 'ppo_widgets_init');

/* ----------------------------------------------------------------------------------- */
# Unset size of post thumbnails
/* ----------------------------------------------------------------------------------- */

function ppo_filter_image_sizes($sizes) {
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['large']);

    return $sizes;
}

add_filter('intermediate_image_sizes_advanced', 'ppo_filter_image_sizes');
/*
  function ppo_custom_image_sizes($sizes){
  $myimgsizes = array(
  "image-in-post" => __("Image in Post"),
  "full" => __("Original size")
  );

  return $myimgsizes;
  }

  add_filter('image_size_names_choose', 'ppo_custom_image_sizes');
 */
/* ----------------------------------------------------------------------------------- */
# User login
/* ----------------------------------------------------------------------------------- */
add_action('init', 'redirect_after_logout');

function redirect_after_logout() {
    if (preg_match('#(wp-login.php)?(loggedout=true)#', $_SERVER['REQUEST_URI']))
        wp_redirect(get_option('siteurl'));
}

/* ----------------------------------------------------------------------------------- */
# Register menu location
/* ----------------------------------------------------------------------------------- */

function admin_add_custom_js() {
    ?>
    <script type="text/javascript">/* <![CDATA[ */
        jQuery(function($){
            $("#btnNewCF").click(function(){
                var lastTR = $("table#tblCourse tr[id^=col-]").eq($("table#tblCourse tr[id^=col-]").length-1);
                var tr_id = lastTR.attr('id');
                var num = tr_id.substr(tr_id.lastIndexOf("-") + 1);
                ++num;
                /*var cloneTR = lastTR.clone(true, true).get(0);
                $(cloneTR).find("*").each(function(index, element){
                    if(element.id){
                        var matches = element.id.match(/(.+)\[\d+](.+)?/);
                        //alert(matches[0] + "\t" + matches[1] + "\t" + matches[2]);
                        if(matches && matches.length >= 3 && matches[2] != null){            // Captures start at [1].
                            element.id = matches[1] + "[" + num + "]" + matches[2];
                        }else if(matches && matches.length >= 3){
                            element.id = matches[1] + "[" + num + "]";
                        }
                    }
                    if(element.name){
                        var matches = element.name.match(/(.+)\[\d+](.+)?/);
                        if(matches && matches.length >= 3 && matches[2] != null){            // Captures start at [1].
                            element.name = matches[1] + "[" + num + "]" + matches[2];
                        }else if(matches && matches.length >= 3){
                            element.name = matches[1] + "[" + num + "]";
                        }
                    }
                });
                        
                lastTR.after('<tr id="col-' + num + '">' + $(cloneTR).html() + '</tr>');
                 */
                var html = '<td>\
                <p><input type="text" style="width:99%" value="Tiêu đề ' + (num + 1) +  '" name="course_field[' + num + ']"></p>\
                <div><textarea id="area_course_field[' + num + ']" name="area_course_field[' + num + ']" cols="40" rows="20"></textarea></div>\
                <p><input type="button" class="button" name="btnDel_'+ num +'" value="Xoá" /></p>\
                </td>';
                lastTR.after('<tr id="col-' + num + '">' + html + '</tr>');
                tinyMCE.execCommand('mceAddEditor', false, 'area_course_field[' + num + ']');
                /*$.get(ajaxurl, {
                    action:'getWPEditorGenerated',
                    field:'area_course_field[' + num + ']'
                }, function(data) {
                    var html = '<td><p><input type="text" style="width:99%" value="Tiêu đề ' + (num + 1) +  '" name="course_field[' + num + ']"></p>' + data + '</td>';
                    lastTR.after('<tr id="col-' + num + '">' + html + '</tr>');
                });*/
                del_item_course();
                if($("#btnNewCF").length > 0)
                    tinyMCE.triggerSave();
                });
                function del_item_course(){
                    $("input[name^=btnDel_]").each(function(){
                        $(this).click(function(){
                            $(this).parent().parent().remove();
                        });
                    });
                }
                $(window).load(function(){
                    del_item_course();
                });
            });
            /* ]]> */
    </script>
    <?php

}

add_action('admin_print_footer_scripts', 'admin_add_custom_js', 99);
/* ----------------------------------------------------------------------------------- */
# Custom search
/* ----------------------------------------------------------------------------------- */

/*add_action('pre_get_posts','custom_search_filter');

function custom_search_filter($query) {
    if (!is_admin() && $query->is_main_query()) {
        $post_type = 'product';
        if ($query->is_archive and (is_taxonomy('product_category') or is_taxonomy('product_group'))) {
            $products_per_page = intval(get_option(SHORT_NAME . "_product_pager"));
            $query->set('posts_per_page', $products_per_page);
            if (getRequest('orderby') != "" and getRequest('order') != "") {
                $orderby = getRequest('orderby');
                if (getRequest('orderby') == "price") {
                    $query->set('orderby', "meta_value_num");
                    $query->set('meta_key', "gia_moi");
                } else {
                    $query->set('orderby', $orderby);
                }
            }
        } elseif ($query->is_home) {
            $query->set('post_type', $post_type);
        }
    }
    return $query;
}*/

/*
  add_filter('posts_where', 'title_like_posts_where');

  function title_like_posts_where($where){
  global $wpdb, $wp_query;
  if($wp_query->is_search){
  $where = str_replace("AND ((ppo_postmeta.meta_key =", "OR ((ppo_postmeta.meta_key =", $where);
  }
  return $where;
  }
 */
/* ----------------------------------------------------------------------------------- */
# Custom style
/* ----------------------------------------------------------------------------------- */
add_action('wp_head', 'ppo_bg_home');

function ppo_bg_home() {
    $bgImage = stripslashes(get_option('bghome'));
    $style = '<style type="text/css">';
    if (strlen($bgImage) > 0) {
        $style .= <<<HTML
.home{background:url("{$bgImage}") no-repeat top center;}
HTML;
    }
    $style .= '</style>';
    echo $style;
}