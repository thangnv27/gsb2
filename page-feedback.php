<?php
/*
  Template Name: Mẫu trang danh sách cảm nhận
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
        <div class="row archive">
            <div class="col-md-8">
                <?php
                $counter = 0;
                   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $loop = new WP_Query(
                                    array(
                                        'post_type' => 'feedback',
                                        'paged' => $paged
                                    )
                    );
                while ($loop->have_posts()) : $loop->the_post();
                    ?>
                        <div class="post-item row">
                            <div class="col-md-4">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <img src="<?php echo get_image_url(); ?>" class="img-rounded" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" onerror="if (this.src != no_image_src) this.src = no_image_src;" />
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                                <div class="des"><?php echo get_short_content(get_the_excerpt(), 500); ?></div>
                            </div>
                        </div>
                    <?php
                    $counter++;
                endwhile;
                ?>
                <?php getpagenavi(array('query' => $loop)); ?>
            </div>
            <div class="col-md-4 sidebar">
<?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>


