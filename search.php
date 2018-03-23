<?php get_header(); ?>
<div id="content-wrapper" class="col-2-layout mobile-nobreak">
    <section class="main-label">
        <div class="container">
            <div class="header">
                <h1>Kết quả tìm kiếm "<?php the_search_query(); ?>"</h1>
            </div>
        </div>
    </section>
    <div class="container layout-2">
        <div class="row archive">
            <div class="col-md-8">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="post-item row">
                        <div class="col-md-4">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo get_image_url(); ?>" class="img-rounded" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                            <div class="des"><?php echo get_short_content(get_the_excerpt(), 200); ?></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php endwhile; ?>
                <?php getpagenavi(); ?>
            </div>
            <div class="col-md-4 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>