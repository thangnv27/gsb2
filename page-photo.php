<?php
/*
  Template Name: Mẫu trang photo
 */
get_header();
?>
<div class="container clearfix">
    <?php while (have_posts()) : the_post(); ?>
        <div class="row-fluid page">
            <div class="span8 post">
                <div class="heading"><h1><?php the_title(); ?></h1></div>
                <div class="post_content">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $loop = new WP_Query(
                        array(
                            'post_type' => 'photo',
                            'paged' => $paged,
                            'posts_per_page' => 9
                        )
                    );
                    $counter = 0;
                    while ($loop->have_posts()) : $loop->the_post();
                    $counter++;
                        ?>
                    <?php if ($counter % 4 == 0) : ?>
                    <div class="clearfix"></div>
                    <div class="span4 album mb20 ml0">
                        <div class="album-thumb">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="img-polaroid" src="<?php get_image_url(); ?>" title="<?php the_title(); ?>" /></a>
                        </div>
                        <div class="album-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                        <div class="album-des">
                            <?php echo get_short_content(removeImg(get_post_meta(get_the_ID(), 'photo_des', true)), 120); ?>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="span4 album mb20">
                    <div class="album-thumb">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="img-polaroid" src="<?php get_image_url(); ?>" title="<?php the_title(); ?>" /></a>
                    </div>
                    <div class="album-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                    <div class="album-des">
                        <?php echo get_short_content(removeImg(get_post_meta(get_the_ID(), 'photo_des', true)), 120); ?>
                    </div>
                </div>
                    <?php endif; endwhile; ?>
                    <?php getpagenavi(array('query' => $loop)); ?>
                </div>
            </div>
            <div class="span4 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>