<?php 
/*
  Template Name: Mẫu tuỳ chỉnh
 */
get_header(); ?>
<div id="content-wrapper" class="col-2-layout mobile-nobreak page-builder">
    <?php while (have_posts()) : the_post(); ?>
        <div class="post-content">
            <?php the_content(); ?>
            <?php echo get_post_meta(get_queried_object_id(), "page_code", true); ?>
        </div>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>