<?php
add_action( 'wp_ajax_nopriv_' . getRequest('action'), getRequest('action') );  
add_action( 'wp_ajax_' . getRequest('action'), getRequest('action') ); 

if(!is_admin()){
    add_action('init', 'add_custom_js');
}

function add_custom_js() {
    // code to embed th  java script file that makes the Ajax request  
    wp_enqueue_script('ajax.js', get_bloginfo('template_directory') . "/js/ajax.js", array('jquery'), false, true);
    // code to declare the URL to the file handling the AJAX request 
    //wp_localize_script( 'ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
}
/* ----------------------------------------------------------------------------------- */
# Get WP Editor
/* ----------------------------------------------------------------------------------- */
function getWPEditorGenerated(){
    $field = getRequest("field");
    if(!empty($field)){
        wp_editor("", $field, array(
            'textarea_name' => $field,
            'tinymce' => array(
                "textarea_rows" => 5
            )
        ));
    }else{
        echo '<div><textarea id="', $field, '" name="', $field, '" cols="40" rows="20"></textarea></div>';
    }
    exit();
}
/* ----------------------------------------------------------------------------------- */
# Send Feedback
/* ----------------------------------------------------------------------------------- */
function sendFeedback(){
    $name = getRequest("name");
    $email = getRequest("email");
    $phone = getRequest("phone");
    $content = getRequest("content");
    
    $errMsg = "";
    if($_SESSION['security_code'] != getRequest('captcha')){
        $errMsg .= "<p>Sai mã bảo vệ.</p>";
    }else{
        if($name == ""){
            $errMsg .= "<p>Vui lòng nhập họ tên.</p>";
        }
        if($email == ""){
            $errMsg .= "<p>Vui lòng nhập địa chỉ Email.</p>";
        }elseif(!is_email($email)){
            $errMsg .= "<p>Địa chỉ Email không hợp lệ.</p>";
        }
        if($phone == ""){
            $errMsg .= "<p>Vui lòng nhập điện thoại.</p>";
        }
        if($content == ""){
            $errMsg .= "<p>Vui lòng nhập nội dung.</p>";
        }
    }
    
    if($errMsg == ""){
        $admin_email = get_settings('admin_email');
        $blogname = get_option('blogname');
        $subject = "Góp ý - " . $blogname;
        $message = <<<HTML
<p>Chào {$blogname},</p>
<p>Bạn nhận được một thư góp ý từ:</p>
<p>
    Họ và tên: {$name}<br />
    Email: {$email}<br />
    Điện thoại: {$phone}<br />
</p>
<p>Nội dung:</p>
<div>{$content}</div>
<br />
Thank you,
HTML;
        
        add_filter( 'wp_mail_content_type', 'set_html_content_type' );
        wp_mail( $admin_email, $subject, $message);
        // reset content-type to avoid conflicts
        remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
        
        Response(json_encode(array(
                    'status' => 'success',
                    'message' => "<p>Thư gửi thành công. Cám ơn bạn đã gửi thư góp ý tới chúng tôi!</p>",
                )));
        
        if(function_exists("mymail_subscribe")){
            $login = explode("@", $email);
            $username = $login[0];
            $user_data = apply_filters('mymail_register_post_userdata', array('firstname' => $name), $username, $email );
            mymail_subscribe( $email, $user_data, mymail_option('register_signup_lists') );
        }
    }else{
        Response(json_encode(array(
                    'status' => 'error',
                    'message' => $errMsg,
                )));
    }
    
    exit();
}

/* ----------------------------------------------------------------------------------- */
# Send Feedback to Developer
/* ----------------------------------------------------------------------------------- */
function sendPPOFeedback(){
    $name = getRequest("name");
    $email = getRequest("email");
    $phone = getRequest("phone");
    $content = getRequest("content");
    
    $errMsg = "";
    if($name == ""){
        $errMsg .= "<p>Vui lòng nhập họ tên.</p>";
    }
    if($email == ""){
        $errMsg .= "<p>Vui lòng nhập địa chỉ Email.</p>";
    }elseif(!is_email($email)){
        $errMsg .= "<p>Địa chỉ Email không hợp lệ.</p>";
    }
    if($phone == ""){
        $errMsg .= "<p>Vui lòng nhập điện thoại.</p>";
    }
    if($content == ""){
        $errMsg .= "<p>Vui lòng nhập nội dung.</p>";
    }
    
    if($errMsg == ""){
        $subject = "Feedback - " . get_bloginfo('siteurl');
        $message = <<<HTML
<p>Chào PPO,</p>
<p>Bạn nhận được một thư góp ý từ:</p>
<p>
    Họ và tên: {$name}<br />
    Email: {$email}<br />
    Điện thoại: {$phone}<br />
</p>
<p>Nội dung:</p>
<div>{$content}</div>
<br />
Thank you,
HTML;
        
        add_filter( 'wp_mail_content_type', 'set_html_content_type' );
        wp_mail( 'support@ppo.vn', $subject, $message);
        // reset content-type to avoid conflicts
        remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
        
        Response(json_encode(array(
                    'status' => 'success',
                    'message' => "<p>Thư gửi thành công. Cám ơn bạn đã gửi thư góp ý tới chúng tôi!</p>",
                )));
    }else{
        Response(json_encode(array(
                    'status' => 'error',
                    'message' => $errMsg,
                )));
    }
    exit();
}
/* ----------------------------------------------------------------------------------- */
# Send Email Register
/* ----------------------------------------------------------------------------------- */
function sendPPORegister(){
    $name = getRequest("fullname");
    $email = getRequest("email");
    $phone = getRequest("moblie");
    $center = getRequest("center");
    
    $errMsg = "";
    if($name == ""){
        $errMsg .= "<p>* Vui lòng nhập họ tên.</p>";
    }
    if($email == ""){
        $errMsg .= "<p>* Vui lòng nhập địa chỉ Email.</p>";
    }elseif(!is_email($email)){
        $errMsg .= "<p>* Địa chỉ Email không hợp lệ.</p>";
    }
    if($phone == ""){
        $errMsg .= "<p>* Vui lòng nhập điện thoại.</p>";
    }
    if($errMsg == ""){
        $subject = "Register - " . get_bloginfo('name');
        $message = <<<HTML
<p>Bạn nhận được một thư Đăng ký từ:</p>
<p>
    Họ và tên: {$name}<br />
    Email: {$email}<br />
    Điện thoại: {$phone}<br />
    Địa điểm học: {$center}<br />
</p>

Thank you,
HTML;
        
        add_filter( 'wp_mail_content_type', 'set_html_content_type' );
        wp_mail( 'gsbnhanvien@gmail.com', $subject, $message);
        // reset content-type to avoid conflicts
        remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
        
        Response(json_encode(array(
                    'status' => 'success',
                    'message' => "<p>Đăng ký thành công. Chào mừng bạn đến với Nguyễn Hiển GoogleSearchBox!</p>",
                )));
    }else{
        Response(json_encode(array(
                    'status' => 'error',
                    'message' => $errMsg,
                )));
    }
    exit();
}


