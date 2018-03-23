<?php
/*
  Template Name: Mẫu trang lịch khai giảng
 */
get_header();
?>
<div id="content-wrapper" class="col-2-layout mobile-nobreak">
    <section class="main-label">
        <div class="container">
            <div class="header">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </section>
    <div class="container layout-2">
        <?php while (have_posts()) : the_post(); ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="post-content">
                        <?php the_content(); ?>
                        <table class="schedu table table-striped">
                            <thead>
                                <tr>
                                    <th>Khóa học</th>
                                    <th>Khai giảng</th>
                                    <th>Lịch học</th>
                                    <th>Thời lượng</th>
                                    <th>Đăng ký</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $loop = new WP_Query(
                                        array(
                                    'post_type' => 'scheduling',
                                    'posts_per_page' => -1
                                        )
                                );
                                while ($loop->have_posts()) : $loop->the_post();
                                    ?>
                                    <tr>
                                        <td><?php the_title(); ?></td>
                                        <td><?php echo get_post_meta(get_the_ID(), "scheduling_date", true); ?></td>
                                        <td><?php echo get_post_meta(get_the_ID(), "scheduling_schedu", true); ?></td>
                                        <td><?php echo get_post_meta(get_the_ID(), "scheduling_thoiluong", true); ?></td>
                                        <td><a target="_blank" href="<?php echo get_post_meta(get_the_ID(), "scheduling_link", true); ?>" class="btn btn-success">Đăng ký</a></td>
                                    </tr>
                                    <?php
                                endwhile;
                                wp_reset_query();
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="share"><?php show_share_socials(); ?></div>
                </div>
                <div class="col-md-4 sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>