<?php
add_action('admin_menu', 'add_ppo_userguide_page');

function add_ppo_userguide_page() {
    add_submenu_page(MENU_NAME, //Menu ID – Defines the unique id of the menu that we want to link our submenu to. 
                                //To link our submenu to a custom post type page we must specify - 
                                //edit.php?post_type=my_post_type
            __('Hướng dẫn sử dụng'), // Page title
            __('Hướng dẫn'), // Menu title
            'edit_themes', // Capability - see: http://codex.wordpress.org/Roles_and_Capabilities#Capabilities
            'ppo_userguide', // Submenu ID – Unique id of the submenu.
            'ppo_userguide_page' // render output function
    );
}
function ppo_userguide_page() {
    ?>
<style>
    .userguide-content{
        margin-top: 20px;
    }
    .userguide-content ol{
        list-style: decimal;
        padding-left: 20px;
        display: block;
        margin-bottom: 20px;
    }
    .userguide-content h3{
        display: block;
    }
</style>
    <div class="wrap">
        <div class="opwrap" style="margin-top: 10px;" >
            <div class="icon32" id="icon-options-general"></div>
            <h2 class="wraphead">Hướng dẫn sử dụng</h2>
            <div class="userguide-content">
                <h3>Lưu ý</h3>
                <ol>
                    <li>Hosting cài PHP version 5.4.0 trở lên.</li>
                    <li>Khi đăng bài chọn ảnh đại diện phải chọn ảnh có kích thước có tỷ lệ <strong>3:2</strong> và tối thiểu là 300x200. Ví dụ: 300x200, 600x400,...</li>
                    <li>Để đăng bài dạng VIDEO thì phải chọn Format là Video.</li>
                    <li>Để video hiển thị trong block "<strong>Video nổi bật</strong>" thì bài viết dạng video đó phải được SET là <strong>nổi bật</strong> và bị giới hạn số lượng hiển thị là 5.</li>
                    <li>Để đưa các chuyên mục ra slider ở trang chủ thì vảo <strong>PPO Settings -> Home Options</strong> sau đó kéo thả các chuyên mục.</li>
                    <li>Để tạo các <strong>BOX, Tick,...</strong> bạn có thể sử dụng AddQuickTags trên trình soạn thảo:
                        <ol>
                            <li>Bước 1: Nếu ở tab Visual bạn chỉ cần chọn 1 trên selectbox AddQuickTags. Nếu ở tab Text bạn chỉ cần click vào 1 shortcode trên thanh công cụ soạn thảo.</li>
                            <li>Bước 2: Bạn nhập nội dung cho các thẻ đó.</li>
                        </ol>
                    </li>
                    <li>Muốn hiển thị các bài viết thuộc 1 hoặc nhiều chuyên mục ra sidebar thì có thể kéo thả widget <strong><?php echo THEME_NAME ?> Categories</strong> trong phần Widgets.</li>
                    <li>Tạo menu và muốn hiển thị menu đó ra ngoài phải tích chọn menu với 1 Location bên dưới.</li>
                </ol>
                <h3>Excerpt</h3>
                <ol>
                    <li>Video và Image: giới hạn 120 ký tự.</li>
                    <li>Bài viết thông thường (Standard): giới hạn 500 ký tự.</li>
                    <li>Khóa học: giới hạn 500 ký tự.</li>
                </ol>
                <h3>Khoá học</h3>
                <ol>
                    <li>Muốn thêm một thuộc tính mới thì bạn chỉ cần bấm vào nút "<strong>Thêm thuộc tính</strong>"</li>
                    <li>Muốn xoá một thuộc tính trong một khoá học chỉ bấm vào nút <storng>Xoá</storng> ở phía dưới mỗi thuộc tính.</li>
                    <li>Mỗi khoá học cần có ít nhất một thuộc tính.</li>
                    <li>Ở trang chủ chỉ có thể hiển thị 1 khoá học được SET là nổi bật.</li>
                    <li>Thứ tự thuộc tính: Thuộc tính nào ở trên thì thuộc tính lên trên đầu.</li>
                </ol>
                <h3>Lịch khai giảng</h3>
                <ol>
                    <li>Muốn hiển thị lịch khai giảng ra trang chủ/footer thì phải SET nổi bật. Không giới hạn số lượng nên có thể thêm/bớt tuỳ ý.</li>
                    <li>Truy cập vào trang Lịch khai giảng sẽ hiển thị ra tất cả lịch khai giảng.</li>
                </ol>
            </div>
        </div>
    </div>
    <?php
}

