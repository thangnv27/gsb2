<?php
$pages = get_pages();
$page_list = array();
foreach ($pages as $page) {
    $page_list[$page->ID] = $page->post_title;
}
$categories = get_categories();
$category_list = array();
foreach ($categories as $category) {
    $category_list[$category->term_id] = $category->name;
}
$options = array(
    'general' => array(
        "name" => "General",
        array("id" => "ppo_opt",
            "std" => "general",
            "type" => "hidden"),
        array("name" => "Site Options",
            "type" => "title",
            "desc" => ""),
        array("type" => "open"),
        array("name" => "Đơn vị chủ thể",
            "desc" => "Ví dụ: Công ty CP ABC",
            "id" => "unit_owner",
            "std" => "",
            "type" => "text"),
        array("name" => "Keywords meta",
            "desc" => "Enter the meta keywords for all pages. These are used by search engines to index your pages with more relevance.",
            "id" => "keywords_meta",
            "std" => "",
            "type" => "text"),
        array("name" => "Favicon",
            "desc" => "An icon associated with a particular website, and typically displayed in the address bar of a browser viewing the site. Size: 16x16",
            "id" => "favicon",
            "std" => "",
            "type" => "text",
            "btn" => true),
        array("name" => "Logo",
            "desc" => "Size: 266x80",
            "id" => "sitelogo",
            "std" => "",
            "type" => "text",
            "btn" => true),
        array("name" => "Banner",
            "desc" => "Size: 545x80",
            "id" => "topbanner",
            "std" => "",
            "type" => "text",
            "btn" => true),
        array("name" => "Ảnh nền home",
            "desc" => "Size: 1280xX",
            "id" => "bghome",
            "std" => "",
            "type" => "text",
            "btn" => true),
        array("name" => "Thông tin trụ sở 1",
            "desc" => "Thông tin chủ thể ở cuối trang.",
            "id" => "footer_info1",
            "std" => "",
            "type" => "textarea",
            "editor" => array(
                "wyswig" => true,
                "rows" => 10,
            )),
        array("name" => "Thông tin trụ sở 2",
            "desc" => "Thông tin chủ thể ở cuối trang.",
            "id" => "footer_info2",
            "std" => "",
            "type" => "textarea",
            "editor" => array(
                "wyswig" => true,
                "rows" => 10,
            )),
        array("type" => "close"),
        array("type" => "submit"),
    ),
    'theme-options' => array(
        "name" => "Theme Options",
        array("id" => "ppo_opt",
            "std" => "theme-options",
            "type" => "hidden"),
        array("name" => "Tùy chọn trang",
            "type" => "title",
            "desc" => "",
        ),
        array("type" => "open"),
        array("name" => "Liên hệ",
            "desc" => "Trang hiển thị thông tin liên hệ.",
            "id" => SHORT_NAME . "_pageContactID",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("name" => "Cảm nhận",
            "desc" => "Trang hiển thị danh sách cảm nhận.",
            "id" => SHORT_NAME . "_pageFeedback",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("name" => "Lịch khai giảng",
            "desc" => "Trang hiển thị tất cả lịch khai giảng.",
            "id" => SHORT_NAME . "_pageLichKG",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("name" => "Video giới thiệu",
            "desc" => "ID video giới thiệu.",
            "id" => SHORT_NAME . "_videohome",
            "std" => '',
            "type" => "select",
            "options" => $page_list),
        array("name" => "Shortcode đăng ký",
            "desc" => "Điền shortcode form đăng ký",
            "id" => SHORT_NAME . "_frmregister",
            "std" => '',
            "type" => "text"),
        array("name" => "Thời gian đăng ký",
            "desc" => "Điền thời gian đăng ký",
            "id" => SHORT_NAME . "_timereg",
            "std" => '',
            "type" => "text"),
        array("name" => "URL đăng ký",
            "desc" => "",
            "id" => SHORT_NAME . "_urlreg",
            "std" => '',
            "type" => "text"),
        array("name" => "Shortcode countdown",
            "desc" => "Điền shortcode countdown",
            "id" => SHORT_NAME . "_countdown",
            "std" => '',
            "type" => "textarea"),
        array("name" => "Nhúng học online",
            "desc" => "Mã nhúng học online",
            "id" => SHORT_NAME . "_hoconline",
            "std" => '',
            "type" => "text"),
        array("name" => "Đăng ký nhanh",
            "desc" => "Form hiển thị ở trang chủ",
            "id" => SHORT_NAME . "_frmHomeQuick",
            "std" => '',
            "type" => "textarea",
            "editor" => array(
                "wyswig" => true,
                "rows" => 10,
            )),
        array("name" => "Feedback Avatar",
            "desc" => "Size: 198x198",
            "id" => SHORT_NAME . "_fb_avatar",
            "std" => "",
            "type" => "text",
            "btn" => true),
        array("name" => "Feedback tiêu đề",
            "id" => SHORT_NAME . "_fb_title",
            "std" => '',
            "type" => "text"),
        array("name" => "Feedback nội dung",
            "id" => SHORT_NAME . "_fb_noidung",
            "std" => '',
            "type" => "textarea"),
        array("type" => "close"),
        array("name" => "Tùy chọn khác",
            "type" => "title",
            "desc" => "Tìm chỉnh website.",
        ),
        array("type" => "open"),
        array("name" => "Fixed menu",
            "desc" => "Menu chính của bạn sẽ luôn dính ở phía trên trình duyệt.",
            "id" => SHORT_NAME . "_fixedMenu",
            "std" => '',
            "type" => "checkbox"),
        array("name" => "Link DMCA",
            "desc" => "Nhập link DMCA chứng thực website của bạn.",
            "id" => SHORT_NAME . "_linkDMCA",
            "std" => '',
            "type" => "text"),
        array("name" => "Hotline",
            "desc" => "Nhập số điện thoại hỗ trợ. Ví dụ: 096.4747.046",
            "id" => SHORT_NAME . "_hotline",
            "std" => '',
            "type" => "text"),
        array("name" => "Fax",
            "desc" => "Nhập số Fax. Ví dụ: 04 373 40121",
            "id" => SHORT_NAME . "_fax",
            "std" => '',
            "type" => "text"),
        array("name" => "Google Analytics",
            "desc" => "Google Analytics. Ví dụ: UA-40210538-1",
            "id" => SHORT_NAME . "_gaID",
            "std" => "UA-40210538-1",
            "type" => "text"),
        array("name" => "Google maps trụ sở 1",
            "desc" => "Dán đoạn mã của Google maps vào đây. Kích thước 500 x 500",
            "id" => SHORT_NAME . "_gmaps1",
            "std" => '<iframe width="500" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=vi&amp;geocode=&amp;q=S%E1%BB%91+104+Ng%C3%B5+189+Ho%C3%A0ng+Hoa+Th%C3%A1m,+Ng%C3%B5+189,+Li%E1%BB%85u+Giai,+Ba+Dinh+District,+Hanoi,+Vietnam&amp;aq=&amp;sll=21.040036,105.819889&amp;sspn=0.011656,0.021136&amp;ie=UTF8&amp;hq=S%E1%BB%91+104+Ng%C3%B5+189+Ho%C3%A0ng+Hoa+Th%C3%A1m,&amp;hnear=Ng%C3%B5+189,+%C4%90%E1%BB%99i+C%E1%BA%A5n,+Ba+%C4%90%C3%ACnh,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;ll=21.04172,105.820717&amp;spn=0.046621,0.084543&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1398663498302061535&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=vi&amp;geocode=&amp;q=S%E1%BB%91+104+Ng%C3%B5+189+Ho%C3%A0ng+Hoa+Th%C3%A1m,+Ng%C3%B5+189,+Li%E1%BB%85u+Giai,+Ba+Dinh+District,+Hanoi,+Vietnam&amp;aq=&amp;sll=21.040036,105.819889&amp;sspn=0.011656,0.021136&amp;ie=UTF8&amp;hq=S%E1%BB%91+104+Ng%C3%B5+189+Ho%C3%A0ng+Hoa+Th%C3%A1m,&amp;hnear=Ng%C3%B5+189,+%C4%90%E1%BB%99i+C%E1%BA%A5n,+Ba+%C4%90%C3%ACnh,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;ll=21.04172,105.820717&amp;spn=0.046621,0.084543&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1398663498302061535" style="color:#0000FF;text-align:left">Xem Bản đồ cỡ lớn hơn</a></small>',
            "type" => "textarea"),
        array("name" => "Google maps trụ sở 2",
            "desc" => "Dán đoạn mã của Google maps vào đây. Kích thước 500 x 500",
            "id" => SHORT_NAME . "_gmaps2",
            "std" => '<iframe width="500" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=vi&amp;geocode=&amp;q=S%E1%BB%91+104+Ng%C3%B5+189+Ho%C3%A0ng+Hoa+Th%C3%A1m,+Ng%C3%B5+189,+Li%E1%BB%85u+Giai,+Ba+Dinh+District,+Hanoi,+Vietnam&amp;aq=&amp;sll=21.040036,105.819889&amp;sspn=0.011656,0.021136&amp;ie=UTF8&amp;hq=S%E1%BB%91+104+Ng%C3%B5+189+Ho%C3%A0ng+Hoa+Th%C3%A1m,&amp;hnear=Ng%C3%B5+189,+%C4%90%E1%BB%99i+C%E1%BA%A5n,+Ba+%C4%90%C3%ACnh,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;ll=21.04172,105.820717&amp;spn=0.046621,0.084543&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1398663498302061535&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=vi&amp;geocode=&amp;q=S%E1%BB%91+104+Ng%C3%B5+189+Ho%C3%A0ng+Hoa+Th%C3%A1m,+Ng%C3%B5+189,+Li%E1%BB%85u+Giai,+Ba+Dinh+District,+Hanoi,+Vietnam&amp;aq=&amp;sll=21.040036,105.819889&amp;sspn=0.011656,0.021136&amp;ie=UTF8&amp;hq=S%E1%BB%91+104+Ng%C3%B5+189+Ho%C3%A0ng+Hoa+Th%C3%A1m,&amp;hnear=Ng%C3%B5+189,+%C4%90%E1%BB%99i+C%E1%BA%A5n,+Ba+%C4%90%C3%ACnh,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;ll=21.04172,105.820717&amp;spn=0.046621,0.084543&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1398663498302061535" style="color:#0000FF;text-align:left">Xem Bản đồ cỡ lớn hơn</a></small>',
            "type" => "textarea"),
        array("name" => "Header Code",
            "desc" => "Phần này cho phép đặt các mã code vào đầu trang.",
            "id" => SHORT_NAME . "_headerCode",
            "std" => '',
            "type" => "textarea"),
        array("name" => "Footer Code",
            "desc" => "Phần này cho phép đặt các mã code vào cuối trang.",
            "id" => SHORT_NAME . "_footerCode",
            "std" => '',
            "type" => "textarea"),
        array("type" => "close"),
        array("type" => "submit"),
    ),
    'social-options' => array(
        "name" => "Socials",
        array("id" => "ppo_opt",
            "std" => "social-options",
            "type" => "hidden"),
        array("name" => "Theo dõi trên mạng xã hội",
            "type" => "title",
            "desc" => ""),
        array("type" => "open"),
        array("name" => "Facebook",
            "desc" => "Nhập URL page của bạn trên facebook.",
            "id" => SHORT_NAME . "_fbURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Google plus",
            "desc" => "Nhập URL page của bạn trên Google plus.",
            "id" => SHORT_NAME . "_googlePlusURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Twitter",
            "desc" => "Nhập URL page của bạn trên Twitter.",
            "id" => SHORT_NAME . "_twitterURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Linked In",
            "desc" => "Nhập URL page của bạn trên Linked In.",
            "id" => SHORT_NAME . "_linkedInURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Youtube",
            "desc" => "Nhập URL page của bạn trên Youtube.",
            "id" => SHORT_NAME . "_youtubeURL",
            "std" => "",
            "type" => "text"),
        array("name" => "Pinterest",
            "desc" => "Nhập URL page của bạn trên Pinterest.",
            "id" => SHORT_NAME . "_pinterestURL",
            "std" => "",
            "type" => "text"),
        array("type" => "close"),
        array("name" => "Apps",
            "type" => "title",
            "desc" => ""),
        array("type" => "open"),
        array("name" => "Facebook App ID",
            "desc" => "Nhập ID App Facebook quản lý comment, chia sẻ...",
            "id" => SHORT_NAME . "_appFBID",
            "std" => '',
            "type" => "text"),
        array("name" => "DISQUS Site Shortname",
            "desc" => "Nhập site shortname của bạn trên DISQUS để theo dõi và quản lý bình luận.",
            "id" => SHORT_NAME . "_disqus_shortname",
            "std" => '',
            "type" => "text"),
        array("type" => "close"),
        array("type" => "submit"),
    ),
);

add_action('admin_menu', 'add_settings_page');

/**
 * Add settings page menu
 */
function add_settings_page() {
    global $options;

    add_menu_page(__(THEME_NAME . ' Settings'), // Page title
            __(THEME_NAME . ' Settings'), // Menu title
            'manage_options', // Capability - see: http://codex.wordpress.org/Roles_and_Capabilities#Capabilities
            MENU_NAME, // menu id - Unique id of the menu
            'theme_settings_page', // render output function
            get_template_directory_uri() . '/images/admin/icon_menu.png', // URL icon, if empty default icon
            null // Menu position - integer, if null default last of menu list
    );

    //add_theme_page("THEME_NAME Options", "THEME_NAME Options", 'edit_themes', 'theme_options', 'theme_options_page');

    /* ------------------------------------------------------------------------- */
    # Update Options
    /* ------------------------------------------------------------------------- */
    if (isset($_GET['page']) and $_GET['page'] == MENU_NAME) {
        $act = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
        switch ($act) {
            case "save":
                $update_opt = $_REQUEST['ppo_opt'];
                foreach ($options as $key => $option) {
                    if ($update_opt == $key) {
                        foreach ($option as $field) {
                            if (isset($_REQUEST[$field['id']])) {
                                update_option($field['id'], $_REQUEST[$field['id']]);
                            } else {
                                delete_option($field['id']);
                            }
                        }
                    }
                }
                break;
            case "reset":
                foreach ($options as $key => $option) {
                    foreach ($option as $field) {
                        if (isset($field['std']) and $field['std'] != "") {
                            update_option($field['id'], $field['std']);
                        } else {
                            delete_option($field['id']);
                        }
                    }
                }
                break;
            default:
                break;
        }
        if (isset($_REQUEST['action']) and "" != $_REQUEST['action']) {
            header("Location: {$_SERVER['REQUEST_URI']}&{$_REQUEST['action']}=true");
            die();
        }
    }
}

/**
 * Remove an Existing Sub-Menu
 */
function remove_settings_submenu($menu_name, $submenu_name) {
    global $submenu;
    $menu = $submenu[$menu_name];
    if (!is_array($menu))
        return;
    foreach ($menu as $submenu_key => $submenu_object) {
        if (in_array($submenu_name, $submenu_object)) {// remove menu object
            unset($submenu[$menu_name][$submenu_key]);
            return;
        }
    }
}

/**
 * Theme general settings ouput
 * 
 * @global string THEME_NAME
 */
function theme_settings_page() {
    global $options;
    ?>
    <div class="wrap">
        <div class="opwrap" style="margin-top: 10px;" >
            <div class="icon32" id="icon-options-general"></div>
            <h2 class="wraphead"><?php echo THEME_NAME; ?> Settings</h2>
    <?php
    if (isset($_REQUEST['save']))
        echo '<div id="message" class="updated fade"><p><strong>' . THEME_NAME . ' settings saved.</strong></p></div>';
    if (isset($_REQUEST['reset']))
        echo '<div id="message" class="updated fade"><p><strong>' . THEME_NAME . ' settings reset.</strong></p></div>';
    ?>
            <h2 class="nav-tab-wrapper" id="mainnav">
            <?php
            $i = 0;
            foreach ($options as $key => $option) {
                if ($i == 0) {
                    echo '<a href="#' . $key . '" class="nav-tab nav-tab-active">' . $option['name'] . '</a>';
                } else {
                    echo '<a href="#' . $key . '" class="nav-tab">' . $option['name'] . '</a>';
                }
                $i++;
            }
            ?>
            </h2>
                <?php
                $i = 0;
                foreach ($options as $key => $option) {
                    if ($i != 0) {
                        echo '<div id="tab-' . $key . '" class="tab" style="display: none;">';
                    } else {
                        echo '<div id="tab-' . $key . '" class="tab">';
                    }

                    ppo_output_options_fields($option);

                    echo "</div>";
                    $i++;
                }
                ?>
            <!--            <hr />
                        <form method="post">
                            <input name="reset" type="submit" value="Reset" class="button button-large" />
                            <input type="hidden" name="action" value="reset" />
                        </form>-->
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">/* <![CDATA[ */
        jQuery(function ($) {
            var nav = $('#mainnav'),
                    tabs = $('.tab');

            nav.find('a').on('click', function () {
                nav.find('a').removeClass('nav-tab-active');
                tabs.hide();
                var hash = $(this).addClass('nav-tab-active').attr('href');
                $('#tab-' + hash.substr(1)).show();
                location.hash = hash;
                $('form input[name=ppo_opt]').val(hash.substr(1, hash.length));
                return false;
            });

            $('a[href^=#]').not('.nav-tab').on('click', function () {
                nav.find('a[href=' + $(this).attr('href') + ']').trigger('click');
            });

            (location.hash && nav.find('a[href=' + location.hash + ']').length) ? nav.find('a[href=' + location.hash + ']').trigger('click') : nav.find('a').eq(0).trigger('click');
        });
        /* ]]> */
    </script>
    <?php
}

function ppo_output_options_fields($options) {
    echo '<form method="post">';

    foreach ($options as $option):
        if (is_array($option)):
            $value = "";
            if (!in_array($option['type'], array('title', 'open', 'close', 'break', 'submit'))) {
                $value = (stripslashes(get_settings($option['id'])) == "") ? $option['std'] : stripslashes(get_settings($option['id']));
                if ($option['type'] != 'textarea') {
                    $value = htmlentities($value, ENT_QUOTES | ENT_IGNORE, 'UTF-8', FALSE);
                }
            }
            switch ($option['type']) {
                case "title":
                    echo "<h3>{$option['name']}</h3>";
                    break;
                case "open":
                    echo '<table class="form-table">';
                    break;
                case "close":
                    echo '</table><br />';
                    break;
                case "submit":
                    echo <<<HTML
                    <p class="submit">
                        <input name="save" type="submit" value="Save changes" class="button button-large button-primary" />
                        <input type="hidden" name="action" value="save" />
                    </p>
HTML;
                    break;
                case "break":
                    echo '<hr />';
                    break;
                case "hidden":
                    echo "<input type=\"hidden\" name=\"{$option['id']}\" value=\"$value\" />";
                    break;
                case "text":
                    $value = htmlentities($value, ENT_QUOTES | ENT_IGNORE, 'UTF-8', FALSE);
                    $html = <<<HTML
                    <tr>
                        <th><label for="{$option['id']}">{$option['name']}</label></th>
                        <td>
                            <input type="text" name="{$option['id']}" id="{$option['id']}" value="{$value}" class="regular-text" />
HTML;
                    if (isset($option['btn']) and $option['btn'] == true) {
                        $html .= <<<HTML
                        <input type="button" id="upload_{$option['id']}_button" class="button button-upload" value="Upload" onClick="uploadByField('{$option['id']}')" />
HTML;
                    }
                    $html .= <<<HTML
                            <br /><span class="description">{$option['desc']}</span>
                        </td>
                    </tr>
HTML;
                    echo $html;
                    break;
                case "textarea":
                    echo <<<HTML
                    <tr>
                        <th><label for="{$option['id']}">{$option['name']}</label></th>
                        <td>
HTML;
                    if (isset($option['editor'])) {
                        if (isset($option['editor']['wyswig']) and $option['editor']['wyswig'] == true) {
                            if (isset($option['editor']['rows']) and intval($option['editor']['rows']) > 0) {
                                wp_editor($value, $option['id'], array(
                                    'textarea_name' => $option['id'],
                                    'textarea_rows' => $option['editor']['rows'],
                                ));
                            } else {
                                wp_editor($value, $option['id'], array(
                                    'textarea_name' => $option['id'],
                                ));
                            }
                        } else {
                            $value = htmlentities($value, ENT_QUOTES | ENT_IGNORE, 'UTF-8', FALSE);
                            echo <<<HTML
                            <textarea rows="5" style="width:99%" name="{$option['id']}" id="{$option['id']}">{$value}</textarea><br />
HTML;
                        }
                    } else {
                        $value = htmlentities($value, ENT_QUOTES | ENT_IGNORE, 'UTF-8', FALSE);
                        echo <<<HTML
                        <textarea rows="5" style="width:99%" name="{$option['id']}" id="{$option['id']}">{$value}</textarea><br />
HTML;
                    }
                    echo <<<HTML
                            <span class="description">{$option['desc']}</span>
                        </td>
                    </tr>
HTML;
                    break;
                case "select":
                    echo <<<HTML
                    <tr>
                        <th><label for="{$option['id']}">{$option['name']}</label></th>
                        <td>
                            <select name="{$option['id']}" id="{$option['id']}" class="chosen-select">
HTML;
                    foreach ($option['options'] as $k => $v) {
                        echo '<option value="', $k, '" ', $value == $k ? ' selected="selected"' : '', '>', $v, '</option>';
                    }
                    echo <<<HTML
                            </select><br /><span class="description">{$option['desc']}</span>
                        </td>
                    </tr>
HTML;
                    break;
                case "radio":
                    echo <<<HTML
                    <tr>
                        <th><label for="{$option['id']}">{$option['name']}</label></th>
                        <td>
HTML;
                    foreach ($option['options'] as $k => $v) {
                        echo '<input type="radio" name="', $option['id'], '" value="', $k, '"', $value == $k ? ' checked="checked"' : '', ' /> ', $v, ' ';
                    }
                    echo <<<HTML
                            <br /><span class="description">{$option['desc']}</span>
                        </td>
                    </tr>
HTML;
                    break;
                case "checkbox":
                    echo <<<HTML
                    <tr>
                        <th><label for="{$option['id']}">{$option['name']}</label></th>
                        <td>
HTML;
                    echo '<input type="checkbox" name="', $option['id'], '" id="', $option['id'], '"', $value ? ' checked="checked"' : '', ' />';
                    echo <<<HTML
                            <br /><span class="description">{$option['desc']}</span>
                        </td>
                    </tr>
HTML;
                    break;
                default:
                    break;
            }
        endif; // end: check is array
    endforeach;

    echo "</form>";
}
