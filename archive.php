<?php get_header(); ?>
<div id="content-wrapper" class="col-2-layout mobile-nobreak">
    <section class="main-label">
        <div class="container">
            <div class="header">
                <h1><?php single_cat_title(); ?></h1>
            </div>
        </div>
    </section>
    <div class="container layout-2">
        <div class="row archive">
            <div class="col-md-8">
                <?php
                $counter = 0;
                while (have_posts()) : the_post();
                    ?>
                    <?php if (get_post_format() == 'image') : ?>
                        <?php if ($counter % 3 == 0) : ?>
                            <div class="clearfix"></div>
                            <div class="col-md-4 album mb20 ml0">
                                <div class="album-thumb">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <img width="300" height="200" src="<?php echo get_image_url(); ?>" class="img-rounded" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" onerror="if (this.src != no_image_src) this.src = no_image_src;" />
                                    </a>
                                </div>
                                <div class="album-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                                <div class="album-des">
                                    <?php echo get_short_content(get_the_excerpt(), 120); ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="col-md-4 album mb20">
                                <div class="album-thumb">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <img width="300" height="200" src="<?php echo get_image_url(); ?>" class="img-rounded" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" onerror="if (this.src != no_image_src) this.src = no_image_src;" />    
                                    </a>
                                </div>
                                <div class="album-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                                <div class="album-des">
                                    <?php echo get_short_content(get_the_excerpt(), 120); ?>
                                </div>
                            </div>
                        <?php endif;
                    else : ?>
                        <div class="post-item row">
                            <div class="col-md-4">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <img width="300" height="200" src="<?php echo get_image_url(); ?>" class="img-rounded" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" onerror="if (this.src != no_image_src) this.src = no_image_src;" />    
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                                <div class="des"><?php echo get_short_content(get_the_excerpt(), 500); ?></div>
                            </div>
                        </div>
                    <?php
                    endif;
                    $counter++;
                endwhile;
                ?>
                <?php getpagenavi(); ?>
            </div>
            <div class="col-md-4 sidebar">
<?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>