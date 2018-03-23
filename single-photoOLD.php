<?php get_header(); ?>
<div class="container clearfix">
    <?php while (have_posts()) : the_post(); ?>
        <div class="row-fluid page">
            <div class="span8 post">
                <div class="heading"><h1><?php the_title(); ?></h1></div>
                <div class="post_content alb">
                    <?php
                    $args = array(
                        'orderby' => 'menu_order',
                        'post_type' => 'attachment',
                        'post_parent' => get_the_ID(),
                        'post_mime_type' => 'image',
                        'post_status' => null,
                        'posts_per_page' => -1,
                        'exclude' => get_post_thumbnail_id()
                    );
                    $attachments = get_posts($args);
                    $counter = 0;
                    if ($attachments) :
                        foreach ($attachments as $attachment):
                            $counter++;
                            ?>
                            <?php if ($counter % 4 == 0) : ?>
                                <div class="clearfix"></div>
                                <div class="span4 mb20 ml0">
                                    <?php echo apply_filters('the_content', $attachment->post_content) . wp_get_attachment_link($attachment->ID, 'full', false); ?>
                                </div>
                            <?php else : ?>
                                <div class="span4 mb20">
                                    <?php echo apply_filters('the_content', $attachment->post_content) . wp_get_attachment_link($attachment->ID, 'full', false); ?>
                                </div>
                            <?php
                            endif;
                        endforeach;
                    endif;
                    ?>
                </div>
                <div class="share"><?php show_share_socials(); ?></div>
            </div>
            <div class="span4 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>