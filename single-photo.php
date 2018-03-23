<?php get_header(); ?>
<div class="container clearfix">
    <?php while (have_posts()) : the_post(); ?>
        <div class="row-fluid page">
            <div class="span8 post">
                <div class="heading"><h1><?php the_title(); ?></h1></div>
                <span class="heading-date">
                    Ngày đăng: <?php the_time('d/m/Y'); ?> - Đăng trong <?php the_category(', '); ?>
                </span>
                <div class="post_content">
                    <?php the_content(); ?>
                </div>
                <div class="tags_box"><p><?php the_tags('<b>TAGS: </b>', ', ', ''); ?></p></div>
                <div class="share"><?php show_share_socials(); ?></div>

                <!--OTHER POST-->
                <div class="orther-post clearfix">
                    <div class="other-title">Bài viết liên quan</div>
                    <div class="other-items">
                        <?php
                        $categories = get_the_category();
                        $cat = array();
                        foreach ($categories as $category) {
                            array_push($cat, $category->term_id);
                        }
                        $excludeID = array();
                        array_push($excludeID, get_the_ID());

                        $args = array(
                            'post_type' => 'post',
                            'post__not_in' => array(get_the_ID()),
                            'posts_per_page' => 5,
                            'category__in' => $cat,
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
            <div class="span4 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>