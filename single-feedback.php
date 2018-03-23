<?php get_header(); ?>
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
            <div class="row page">
                <div class="col-md-8 post-boxes">
                    <p class="heading-date">
                        Đăng trong <a href="<?php bloginfo('siteurl'); ?>/cam-nhan-hoc-vien/">Cảm nhận học viên</a>
                    </p>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="tags_box"><p><?php the_tags('<b>TAGS: </b>', ', ', ''); ?></p></div>
                    <div class="share"><?php show_share_socials(); ?></div>
                    <!--OTHER POST-->
                    <div class="orther-post clearfix">
                        <div class="other-title">Cảm nhận khác</div>
                        <div class="other-items">
                            <?php
                            $args = array(
                                'post_type' => 'feedback',
                                'post__not_in' => array(get_the_ID()),
                                'posts_per_page' => 5,
                            );
                            $loop = new WP_Query($args);
                            ?>
                            <ul>
                                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                    <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                                    <?php
                                    array_push($excludeID, get_the_ID());
                                endwhile;
                                wp_reset_query();
                                ?>
                            </ul>
                        </div>
                    </div>
                     <!--RANDOM POST-->
                    <div class="orther-post clearfix">
                        <div class="other-title">Bài viết ngẫu nhiên</div>
                        <div class="other-items">
                            <ul>
                                <?php
                                $loop = new WP_Query(array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 5,
                                    'orderby' => 'rand',
                                    'post__not_in' => $excludeID,
                                ));
                                while ($loop->have_posts()) : $loop->the_post();
                                    ?>
                                    <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                                    <?php
                                endwhile;
                                wp_reset_query();
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>