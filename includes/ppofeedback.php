<?php
add_action('admin_menu', 'add_ppo_feedback_page');

function add_ppo_feedback_page() {
    add_submenu_page(MENU_NAME, //Menu ID – Defines the unique id of the menu that we want to link our submenu to. 
                                //To link our submenu to a custom post type page we must specify - 
                                //edit.php?post_type=my_post_type
            __('FeedBack'), // Page title
            __('FeedBack'), // Menu title
            'edit_themes', // Capability - see: http://codex.wordpress.org/Roles_and_Capabilities#Capabilities
            'ppo_feedback', // Submenu ID – Unique id of the submenu.
            'ppo_feedback_page' // render output function
    );
}
function ppo_feedback_page() {
    ?>
    <div class="wrap">
        <div class="opwrap" style="margin-top: 10px;" >
            <div class="icon32" id="icon-options-general"></div>
            <h2 class="wraphead">Send FeedBack</h2>
            <h4>
                Bạn cần hỗ trợ, yêu cầu hay có góp ý gì. Hãy liên hệ với chúng tôi:<br />
                <span>Email: <a href="mailto:support@ppo.vn">support@ppo.vn</a></span><br />
                <span>Điện thoại: 046 2929 445</span><br />
                Hoặc qua form bên dưới:
            </h4>
            <div id="message" class="updated fade" style="display: none;"></div>
            <form action="" method="post" id="frmFeedback">
                <input type="hidden" name="action" value="sendPPOFeedback" />
                <p>
                    <label for="feedback_name">Họ và tên (*):</label><br />
                    <input name="name" id="feedback_name" value="" class="regular-text" type="text" />
                </p>
                <p>
                    <label for="feedback_email">Địa chỉ email (*):</label><br />
                    <input name="email" id="feedback_email" value="" class="regular-text" type="text" />
                </p>
                <p>
                    <label for="feedback_phone">Điện thoại (*):</label><br />
                    <input name="phone" id="feedback_phone" value="" class="regular-text" type="text" />
                </p>
                <p>
                    <label for="feedback_content">Nội dung (*):</label><br />
                    <!--<textarea style="width: 100%;height: 300px;" name="content" id="feedback_content"></textarea>-->
                    <?php
                    wp_editor('', 'content', array(
                        'textarea_name' => 'content',
                    ));
                    ?>
                </p>
                <div class="submit">
                    <input name="send" type="submit" value="Gửi" class="button button-large button-primary" />
                </div>
            </form>
        </div>
    </div>
    <?php
}

