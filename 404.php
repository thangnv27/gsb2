<?php get_header(); ?>
<div class="container clearfix">
        <div class="row-fluid page">
            <div class="span8 post">
                <div class="heading"><h1>404 Not Found</h1></div>
                <div class="post_content">
                    <p>Uhh ohh? Không tìm thấy nội dung.</p>
                    <p>Quay lại <a href="<?php bloginfo('siteurl');?>">trang chủ</a></p>
                </div>
            </div>
            <div class="span4 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
</div>
<?php get_footer(); ?>