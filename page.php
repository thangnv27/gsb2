<?php get_header(); ?>
<div id="content-wrapper" class="col-2-layout mobile-nobreak">
    <section class="main-label">
        <div class="container">
            <div class="header">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </section>
    <div class="container layout-2">
    <?php while (have_posts()) : the_post(); ?>
        <div class="row page">
            <div class="col-md-8 post-boxes">
                <div class="post-content">
                    <?php the_content(); ?>
                    <?php echo stripslashes(get_post_meta(get_queried_object_id(), "page_code", true)); ?>
                </div>
                <div class="share"><?php show_share_socials(); ?></div>
            </div>
            <div class="col-md-4 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>