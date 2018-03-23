<?php
$boxArr = json_decode(get_option('cat_box1'));
if (count($boxArr) > 0):
//        print_r($boxArr);
//    $arr = array();
//    foreach ($boxArr as $catID) :
//    endforeach;
    ?>
    <!--SHOW ITEM IN CATEGORY-->
    <ul class="bxslider" style="display: none">
        <?php
        $loop = new WP_Query(
            array(
        'post_type' => 'post',
//        'category__in' => $boxArr,
        'posts_per_page' => 20
            )
    );
        while ($loop->have_posts()) : $loop->the_post();
            ?>
            <li>
                <?php
                if (get_post_format() == 'video') :
                    ?>
                    <div class="col-ms-6 col-md-3 slider-width">
                        <div class="video video-post">
                            <a href="<?php the_permalink(); ?>"><h5 style="height: 55px;" title="<?php the_title() ?>"><?php echo get_short_content(get_the_title(), 130); ?></h5></a>
                            <a class="tutorial" href="<?php the_permalink(); ?>">
                                <span class="img" style="background: url('<?php get_image_url(); ?>') no-repeat;"></span>
                            </a>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-ms-6 col-md-3 slider-width">
                        <div class="video">
                            <a href="<?php the_permalink(); ?>"><h5 style="height: 55px;" title="<?php the_title() ?>"><?php echo get_short_content(get_the_title(), 130); ?></h5></a>
                            <a class="txt-post" href="<?php the_permalink(); ?>">
                                <img src='<?php get_image_url(); ?>' height="200" width="300" />
                            </a>
                        </div>
                    </div>
                </li>
            <?php
            endif;
        endwhile;
        wp_reset_query();
        ?>
        <?php
//    endforeach;
    endif;
    ?>
</ul>