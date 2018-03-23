<?php
$boxArr = json_decode(get_option('cat_box1'));
if (count($boxArr) > 0):
//        print_r($boxArr);
//    $arr = array();
//    foreach ($boxArr as $catID) :
//    endforeach;
    ?>
    <!--SHOW ITEM IN CATEGORY-->
    <ul class="slider-mobile" style="display: none">
        <?php
        $loop = new WP_Query(
            array(
        'post_type' => 'post',
//        'category__in' => $boxArr,
        'posts_per_page' => 8
            )
    );
        while ($loop->have_posts()) : $loop->the_post();
            ?>  <li>  <a href="<?php the_permalink(); ?>">  <img src="<?php get_image_url(); ?>"  height="200" width="300" title="<?php the_title(); ?>" />  </a>  </li>
            <?php
        endwhile;
        wp_reset_query();
        ?>
        <?php
//    endforeach;
    endif;
    ?>
</ul>