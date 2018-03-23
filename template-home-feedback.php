<div class="main-testimonial wow fadeInUp animated">
    <div class="row">
        <div class="col-sm-4 col-md-4">
            <div class="customer">
                <a href="#">
                    <span class="photo">
                        <img src="<?php echo get_option(SHORT_NAME . "_fb_avatar") ?>" width="198" height="198" />
                    </span>
                </a>
                
            </div>
        </div>
        <div class="col-sm-7 col-md-7">
            <div class="opinion">
                <blockquote>
                    <p>
                        <?php echo get_option(SHORT_NAME . "_fb_title") ?>
                    </p>
                    <cite>
                        <?php echo get_option(SHORT_NAME . "_fb_noidung") ?>
                    </cite>
                </blockquote>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-sm-8 col-md-8">
<?php
$loop = new WP_Query(
        array(
    'post_type' => 'feedback',
    'posts_per_page' => 4,
    'orderby' => 'rand'
        )
);
while ($loop->have_posts()) : $loop->the_post();
    ?>
        <div class="testimonial wow fadeInUp animated">
            <div class="col-ms-3 col-md-3">
                <div class="customer">
                    <a href="<?php the_permalink(); ?>">
                        <span class="photo" style="background: url('<?php echo get_feedback_avatar_url(); ?>') no-repeat center; background-size: cover;"></span>
                    </a>
                </div>
            </div>
            <div class="col-ms-9 col-md-9">
                <div class="opinion">
                    <h4><a href="<?php the_permalink(); ?>"><?php echo get_post_meta(get_the_ID(), "ho_ten", true); ?></a></h4>
                    <blockquote>
                        <?php echo get_short_content(get_the_excerpt(), 150); ?>
                    </blockquote>
                </div>
            </div>
        </div>
    <?php
endwhile;
wp_reset_query();
?>
</div>
<div class="col-sm-4 col-md-4 frm-hoconline wow bounceInRight animated" data-wow-duration="2s" data-wow-delay="500ms">
    <?php
    echo do_shortcode(stripslashes(get_option(SHORT_NAME . "_frmHomeQuick")));
//    echo do_shortcode(stripslashes(get_option(SHORT_NAME . "_hoconline")));
    ?>
    <style type="text/css">
        .getfly-form{
            border: none;
            padding: 15px 0!important;
        }
    </style>
</div>