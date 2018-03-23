<?php
/*
  Template Name: Mẫu trang liên hệ
 */
get_header();
?>
<div id="content-wrapper" class="col-2-layout mobile-nobreak">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="row contact">
                <div class="heading"><h1><?php the_title(); ?></h1></div>
                <div class="post-content">
                    <div class="col-md-6">
                        <?php the_content(); ?>
                        <?php echo stripslashes(get_post_meta(get_queried_object_id(), "page_code", true)); ?>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="contact_info">
                                <?php echo stripslashes(get_option("footer_info1")); ?>
                            </div>
                            <div class="contact_map">
                                <?php echo stripslashes(get_option(SHORT_NAME . "_gmaps1")); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="contact_info">
                                <?php echo stripslashes(get_option("footer_info2")); ?>
                            </div>
                            <div class="contact_map">
                                <?php echo stripslashes(get_option(SHORT_NAME . "_gmaps2")); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>